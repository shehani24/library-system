<?php
include '../conn.php';
session_start();

$cart = json_decode($_POST['cart'], true);
$customerName = $_SESSION['name']; // Replace with dynamic customer info
$customerEmail = $_SESSION['email'];

$totalAmount = array_reduce($cart, function ($sum, $item) {
    return $sum + ($item['price'] * $item['quantity']);
}, 0);

$conn->begin_transaction();

try {
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, total_amount) VALUES (?, ?, ?)");
    $stmt->bind_param('ssd', $customerName, $customerEmail, $totalAmount);
    $stmt->execute();
    $orderId = $stmt->insert_id;

    foreach ($cart as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, book_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param('iii', $orderId, $item['id'], $item['quantity']);
        $stmt->execute();
    }

    $conn->commit();
    echo "Order placed successfully!";
} catch (Exception $e) {
    $conn->rollback();
    echo "Failed to place order.";
}
?>
