<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $content = $conn->real_escape_string($_POST["content"]);

    $sql = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php"); // Redirect back to dashboard
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
