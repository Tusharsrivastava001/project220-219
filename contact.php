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

// Step 2: Get form values
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Step 3: Insert into database
$sql = "INSERT INTO contact_messages (name, email, message) 
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Thank you for contacting us, $name!</h2>";
  echo "<p>We have received your message and will get back to you soon.</p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
