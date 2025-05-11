<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "bookstore");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM books WHERE id=$id");
    $book = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $id = $_POST['id'];

    // Optional: handle image update
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../books-img/" . $image);

        $stmt = $conn->prepare("UPDATE books SET title=?, price=?, image=? WHERE id=?");
        $stmt->bind_param("sdsi", $title, $price, $image, $id);
    } else {
        $stmt = $conn->prepare("UPDATE books SET title=?, price=? WHERE id=?");
        $stmt->bind_param("sdi", $title, $price, $id);
    }

    if ($stmt->execute()) {
        header("Location: dashboard.php?updated=1");
    } else {
        echo "Error updating book: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
  <h2>Edit Book</h2>
  <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <div class="mb-3">
      <label>Title:</label>
      <input type="text" name="title" class="form-control" value="<?= $book['title'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Price:</label>
      <input type="number" name="price" class="form-control" step="0.01" value="<?= $book['price'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Current Image:</label><br>
      <img src="../books-img/<?= $book['image'] ?>" width="100"><br><br>
      <label>Change Image:</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Book</button>
    <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
