<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "bookstore");

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // Save the image into books-img folder
    $uploadDir = "../books-img/"; // Adjusted for your folder structure
    $imagePath = $uploadDir . basename($image);
    move_uploaded_file($tmp, $imagePath);

    // Insert book into database
    $stmt = $conn->prepare("INSERT INTO books (title, price, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $title, $price, $image);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=book_added");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
