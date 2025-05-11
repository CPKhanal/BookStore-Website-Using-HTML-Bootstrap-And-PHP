<?php
// session_start();
// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the announcement ID from the URL
$announcement_id = $_GET['id'];

// Fetch the announcement details
$announcement = $conn->query("SELECT * FROM announcements WHERE id = $announcement_id")->fetch_assoc();

// Fetch replies for this announcement
$replies = $conn->query("SELECT * FROM announcement_replies WHERE announcement_id = $announcement_id ORDER BY created_at DESC");

// Check if the user is logged in to get the user ID
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Announcement Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        window.onload = function() {
            // Focus on the reply textarea as soon as the page loads
            document.getElementById("replyText").focus();
        };
    </script>
    <style>

        /* Align the replies */
        .reply-other {
            text-align: left;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .reply-user {
            text-align: right;
            background-color: #d1e7dd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-left: 50px; /* To prevent overlap */
            
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <!-- Announcement Detail Section -->
    <h2 class="text-center">📢 <?= htmlspecialchars($announcement["title"]) ?></h2>
    <p class="text-muted">Posted on: <?= $announcement["created_at"] ?></p>
    <p><?= nl2br(htmlspecialchars($announcement["content"])) ?></p>

    <!-- Replies Section -->
    <h5>Replies:</h5>
    <?php while ($reply = $replies->fetch_assoc()) {
        // Fetch user details if user_id exists (i.e., not anonymous)
        if ($reply['user_id']) {
            $userResult = $conn->query("SELECT * FROM userdetails WHERE id = " . $reply['user_id']);
            $user = $userResult->fetch_assoc();
            $username = htmlspecialchars($user['name']);
        } else {
            $username = "Anonymous";
        }

        // Determine if the reply is from the logged-in user
        if ($reply['user_id'] == $user_id) {
            // This is the logged-in user's reply, align it to the right
            $reply_class = "reply-user";
        } else {
            // This is someone else's reply, align it to the left
            $reply_class = "reply-other";
        }

        echo "<div class='$reply_class'>
                <strong>" . $username . ":</strong>
                <p>" . nl2br(htmlspecialchars($reply["reply_text"])) . "</p>
                <small>Replied on: " . $reply["created_at"] . "</small>
              </div>";
    }
    ?>

    <!-- Reply Form -->
    <?php if (isset($_SESSION["user_logged_in"])) { ?>
        <form method="POST" action="add_reply.php" class="mt-3">
            <input type="hidden" name="announcement_id" value="<?= $announcement["id"] ?>">
            <textarea id="replyText" name="reply_text" class="form-control" placeholder="Your reply" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Submit Reply</button>
        </form>
    <?php } else { ?>
        <form method="POST" action="add_reply.php" class="mt-3">
            <input type="hidden" name="announcement_id" value="<?= $announcement["id"] ?>">
            <textarea id="replyText" name="reply_text" class="form-control" placeholder="Your reply (Anonymous)" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Submit Reply</button>
        </form>
    <?php } ?>

    <a href="announcements.php" class="btn btn-secondary mt-3">Back to Announcements</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>
