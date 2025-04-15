<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    echo "Please log in.";
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM orders WHERE username = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Your Order History</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['product_title']} - ₹{$row['price']} x {$row['quantity']} on {$row['order_date']}</p>";
}
?>
