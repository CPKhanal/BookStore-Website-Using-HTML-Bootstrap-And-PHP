<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

// $conn = new mysqli("localhost", "root", "", "bookstore");
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get image name to delete the file
    $getImg = $conn->query("SELECT image FROM books WHERE id=$id");
    $img = $getImg->fetch_assoc()['image'];
    unlink("../books-img/" . $img); // delete image from folder

    // Delete from DB
    $conn->query("DELETE FROM books WHERE id=$id");

    header("Location: dashboard.php?msg=deleted");
}
?>
