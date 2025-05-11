<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include('db_connection.php');

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM userdetails WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission to update profile or change password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle profile update
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Update user profile
        $update_query = "UPDATE userdetails SET name = '$name', email = '$email' WHERE id = '$user_id'";
        if (mysqli_query($conn, $update_query)) {
            $message = "Profile updated successfully!";
        } else {
            $message = "Error updating profile: " . mysqli_error($conn);
        }
    }

    // Handle password change
    if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
        // Check if current password matches the one in the database
        $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        // Verify current password
        if (password_verify($current_password, $user['password'])) {
            // Check if new password matches confirm password
            if ($new_password === $confirm_password) {
                // Hash new password before updating
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $password_update_query = "UPDATE userdetails SET password = '$hashed_password' WHERE id = '$user_id'";

                if (mysqli_query($conn, $password_update_query)) {
                    $message = "Password updated successfully!";
                } else {
                    $message = "Error updating password: " . mysqli_error($conn);
                }
            } else {
                $message = "New password and confirmation do not match!";
            }
        } else {
            $message = "Current password is incorrect!";
        }
    }
}

// Fetch updated user details in case the profile was updated
$query = "SELECT * FROM userdetails WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Edit Profile</h1>

    <?php if (isset($message)) { ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php } ?>

    <!-- Back to Dashboard Button -->
    <a href="dashboard.php" class="btn btn-secondary mb-4">Back to Dashboard</a>

    <!-- Profile Update Form -->
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    <hr>

    <!-- Password Change Form -->
    <h2>Change Password</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Change Password</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
