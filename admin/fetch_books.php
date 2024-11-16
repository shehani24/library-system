<?php
include '../conn.php';

$sql = "SELECT * FROM books ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['title']}</td>
        <td>{$row['author']}</td>
        <td>{$row['genre']}</td>
        <td>{$row['publication_year']}</td>
        <td>{$row['price']}</td>
        <td>
            <button class='btn btn-warning btn-sm edit-btn' 
                data-id='{$row['id']}'
                data-title='{$row['title']}'
                data-author='{$row['author']}'
                data-genre='{$row['genre']}'
                data-year='{$row['publication_year']}'
                data-price='{$row['price']}'>Edit</button>
            <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['id']}'>Delete</button>
        </td>
    </tr>";
}
