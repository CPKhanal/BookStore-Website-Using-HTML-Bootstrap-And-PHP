<?php
// Include database connection
include('db_connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM userdetails WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Fetch user orders
$order_query = "SELECT * FROM user_orders WHERE Order_Id IN (SELECT Order_Id FROM order_manager WHERE Full_Name = '{$user['name']}')";
$order_result = mysqli_query($conn, $order_query);

// Fetch user messages (optional)
$message_query = "SELECT * FROM contactus WHERE email = '{$user['email']}'";
$message_result = mysqli_query($conn, $message_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bookstore Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Back to Home</a>


        <!-- Personal Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Personal Information</h3>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>

        <!-- User Orders Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Your Orders</h3>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($order_result) > 0) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($order = mysqli_fetch_assoc($order_result)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['Order_Id']); ?></td>
                                    <td><?php echo htmlspecialchars($order['Item_Name']); ?></td>
                                    <td><?php echo htmlspecialchars($order['Price']); ?></td>
                                    <td><?php echo htmlspecialchars($order['Quantity']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>You have no orders yet.</p>
                <?php } ?>
            </div>
        </div>

        <!-- User Messages Section -->
        <div class="card">
            <div class="card-header">
                <h3>Your Messages</h3>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($message_result) > 0) { ?>
                    <ul class="list-group">
                        <?php while ($message = mysqli_fetch_assoc($message_result)) { ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($message['name']); ?>:</strong> <?php echo htmlspecialchars($message['message']); ?> 
                                <br><small><?php echo htmlspecialchars($message['date']); ?></small>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>You have no messages.</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
