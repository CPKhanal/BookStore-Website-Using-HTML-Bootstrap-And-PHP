<?php
// session_start();
// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch announcements
$announcements = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <!-- Announcements Section -->
    <h2 class="text-center">📢 Announcements</h2>
    <hr>
    <?php while ($row = $announcements->fetch_assoc()) { ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row["title"]) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($row["content"])) ?></p>
                <p class="text-muted">Posted on: <?= $row["created_at"] ?></p>
                
                <!-- View and Reply Button -->
                <a href="announcement_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-3">View and Reply</a>
            </div>
        </div>
    <?php } ?>

</div>

<?php include 'footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>
