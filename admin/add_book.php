<?php
include '../conn.php';

$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$price = $_POST['price'];

$sql = "INSERT INTO books (title, author, genre, publication_year, price) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdi", $title, $author, $genre, $publication_year, $price);

if ($stmt->execute()) {
    echo "Book added successfully!";
} else {
    echo "Error: " . $stmt->error;
}
