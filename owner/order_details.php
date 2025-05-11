<?php
//prevent unauthorized acces
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}
?>
<?php
// Connect to database
// $conn = new mysqli("localhost", "root", "", "bookstore");
// Include database connection
include('db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get Order ID from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 9;

if ($order_id > 0) {
    // Fetch order details
    $orderQuery = "SELECT * FROM order_manager WHERE Order_Id = $order_id";
    $orderResult = $conn->query($orderQuery);
    $order = $orderResult->fetch_assoc();

    // Fetch ordered items
    $itemsQuery = "SELECT * FROM user_orders WHERE Order_Id = $order_id";
    $itemsResult = $conn->query($itemsQuery);
} else {
    echo "Invalid Order ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Order Details</h2>
        <a href="dashboard.php" class="btn btn-secondary mb-3">Back to Dashboard</a>

        <?php if ($order) { ?>
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Order #<?= $order["Order_Id"] ?>
                </div>
                <div class="card-body">
                    <p><strong>Customer Name:</strong> <?= $order["Full_Name"] ?></p>
                    <p><strong>Phone:</strong> <?= $order["Phone_No"] ?></p>
                    <p><strong>Address:</strong> <?= $order["Address"] ?></p>
                    <p><strong>Payment Mode:</strong> <?= $order["Pay_Mode"] ?></p>
                </div>
            </div>

            <h3>Ordered Items</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php while ($item = $itemsResult->fetch_assoc()) { ?>
                <tr>
                    <td><?= $item["Item_Name"] ?></td>
                    <td>$<?= number_format($item["Price"], 2) ?></td>
                    <td><?= $item["Quantity"] ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="text-danger">Order not found.</p>
        <?php } ?>
    </div>
</body>
</html>
