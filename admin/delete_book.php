<?php
include '../conn.php';

$id = $_POST['id'];

$sql = "DELETE FROM books WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Book deleted successfully!";
} else {
    echo "Error: " . $stmt->error;
}
