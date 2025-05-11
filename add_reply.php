<?php
session_start();
// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_id = $_POST["announcement_id"];
    $reply_text = $_POST["reply_text"];

    // Check if user is logged in
    if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] === true) {
        // User is logged in, get the user ID from the session
        $user_id = $_SESSION["user_id"];
    } else {
        // User is not logged in, set user_id to NULL for anonymous replies
        $user_id = NULL;
    }

    // Insert reply into the database
    $stmt = $conn->prepare("INSERT INTO announcement_replies (announcement_id, user_id, reply_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $announcement_id, $user_id, $reply_text);

    if ($stmt->execute()) {
        header("Location: announcements.php");  // Redirect back to the announcements page after successful reply
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
