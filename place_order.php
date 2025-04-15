<?php
session_start();
header('Content-Type: application/json');


if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit;
}

$username = $_SESSION['username'];


$conn = new mysqli("localhost", "root", "", "login_system");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'DB connection failed']);
    exit;
}

$userQuery = $conn->prepare("SELECT id FROM users WHERE username = ?");
$userQuery->bind_param("s", $username);
$userQuery->execute();
$userResult = $userQuery->get_result();

if ($userResult->num_rows !== 1) {
    echo json_encode(['success' => false, 'error' => 'User not found']);
    exit;
}

$user = $userResult->fetch_assoc();
$user_id = $user['id'];


$data = json_decode(file_get_contents("php://input"), true);
$cart = $data['cart'];

if (!$cart || !is_array($cart)) {
    echo json_encode(['success' => false, 'error' => 'Invalid cart data']);
    exit;
}

$success = true;

foreach ($cart as $item) {
    $title = $conn->real_escape_string($item['title']);
    $price = floatval($item['price']);

    $sql = "INSERT INTO orders (user_id, title, price) VALUES ($user_id, '$title', $price)";
    if (!$conn->query($sql)) {
        $success = false;
        break;
    }
}

$conn->close();


if ($success) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to insert one or more items']);
}
exit;
