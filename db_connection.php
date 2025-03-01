<?php
// Database credentials
$servername = "localhost";  // or your host (e.g., '127.0.0.1')
$username = "root";         // replace with your database username
$password = "";             // replace with your database password
$dbname = "bookstore";      // replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
