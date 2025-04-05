<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "<script>alert('Login successful!');</script>";
        // Redirect or session logic can go here
    } else {
        echo "<script>alert('Invalid credentials!'); window.location.href='login.html';</script>";
    }
}
?>
