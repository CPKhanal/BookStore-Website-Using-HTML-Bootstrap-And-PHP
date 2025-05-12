<?php
// Database credentials
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "bookstore";

// Create connection using OOP approach
$conn = new mysqli($servername, $username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
