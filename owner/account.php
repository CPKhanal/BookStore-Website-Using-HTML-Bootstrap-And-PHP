<?php
// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');

// Insert a new admin (Change "admin" and "password123" as needed)
$username = "admin";
$password = password_hash("password123", PASSWORD_DEFAULT);

$query = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Admin created successfully!";
} else {
    echo "Error: " . $stmt->error;
}
?>
