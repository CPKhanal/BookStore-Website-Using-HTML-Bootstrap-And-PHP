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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);

    // Step 1: Delete all replies associated with the announcement
    $deleteRepliesSql = "DELETE FROM announcement_replies WHERE announcement_id = ?";
    $stmt = $conn->prepare($deleteRepliesSql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Step 2: Delete the announcement after deleting the replies
        $deleteAnnouncementSql = "DELETE FROM announcements WHERE id = ?";
        $stmt = $conn->prepare($deleteAnnouncementSql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: dashboard.php"); // Redirect back to dashboard after successful deletion
            exit();
        } else {
            echo "Error deleting announcement: " . $conn->error;
        }
    } else {
        echo "Error deleting replies: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
