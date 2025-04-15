<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "login_system"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$sql = "INSERT INTO reviews (username, rating, review) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $username, $rating, $review);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
