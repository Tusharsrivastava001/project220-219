<?php
// Step 1: Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Get data from form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

// Step 3: Insert into database
$sql = "INSERT INTO users (fullname, email, username, password) 
        VALUES ('$fullname', '$email', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    // Optionally redirect or show a login link
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 4: Close connection
$conn->close();
?>
