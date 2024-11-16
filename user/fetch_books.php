<?php
include '../conn.php';

// Retrieve search term
$search = $_GET['search'] ?? '';

// Query to fetch books based on the search term
$sql = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR genre LIKE ?";
$searchTerm = '%' . $search . '%';

$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Generate HTML for books
$html = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['title']}</h5>
                        <p class='card-text'>Author: {$row['author']}</p>
                        <p class='card-text'>Genre: {$row['genre']}</p>
                        <p class='card-text'><strong>$ {$row['price']}</strong></p>
                        <button class='btn btn-primary add-to-cart' 
                            data-id='{$row['id']}'
                            data-title='{$row['title']}'
                            data-price='{$row['price']}'>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>";
    }
} else {
    $html = "<p class='text-center text-muted'>No books found matching your search.</p>";
}

echo $html;
?>
