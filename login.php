<?php
session_start();

// 🔗 Database connection (no separate config.php)
$host = "localhost";
$user = "root";
$pass = ""; // default for XAMPP
$dbname = "login_system";

$conn = new mysqli($host, $user, $pass, $dbname);

// ❌ Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 🧠 Validate login input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 🔍 Query using prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    
    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password!'); window.location.href='login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
