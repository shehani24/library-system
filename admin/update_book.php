<?php
include '../conn.php';

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$price = $_POST['price'];

$sql = "UPDATE books SET title=?, author=?, genre=?, publication_year=?, price=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssidi", $title, $author, $genre, $publication_year, $price, $id);

if ($stmt->execute()) {
    echo "Book updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}
