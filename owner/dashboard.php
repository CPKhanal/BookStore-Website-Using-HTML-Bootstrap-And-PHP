<?php
//prevent unauthorized access:
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}
?>

<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "bookstore");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total orders
$orderResult = $conn->query("SELECT COUNT(*) AS total_orders FROM order_manager");
$totalOrders = $orderResult->fetch_assoc()["total_orders"];

// Fetch total users
$userResult = $conn->query("SELECT COUNT(*) AS total_users FROM userdetails");
$totalUsers = $userResult->fetch_assoc()["total_users"];

// Fetch recent messages
$messageResult = $conn->query("SELECT * FROM contactus ORDER BY date DESC LIMIT 5");

// Fetch orders
$orders = $conn->query("SELECT * FROM order_manager ORDER BY Order_Id DESC LIMIT 10");

// Fetch users
$users = $conn->query("SELECT * FROM userdetails ORDER BY created_at DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Owner Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Welcome, Admin</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a> <!-- Logout Button -->
    </div>
    <div class="container mt-5">
        <h2 class="text-center">Bookstore Owner Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text"><?= $totalOrders ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text"><?= $totalUsers ?></p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Recent Orders</h3>
        <table class="table table-bordered">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Payment Mode</th>
                <th>Details</th>
            </tr>
            <?php while ($order = $orders->fetch_assoc()) { ?>
                <tr>
                    <td><?= $order["Order_Id"] ?></td>
                    <td><?= $order["Full_Name"] ?></td>
                    <td><?= $order["Phone_No"] ?></td>
                    <td><?= $order["Address"] ?></td>
                    <td><?= $order["Pay_Mode"] ?></td>
                    <td><a href="order_details.php?order_id=<?= $order["Order_Id"] ?>" class="btn btn-info btn-sm">View</a></td>
                </tr>
            <?php } ?>
        </table>


        <h3>Recent Users</h3>
        <table class="table table-bordered">
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>Signup Date</th>
            </tr>
            <?php while ($user = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user["id"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["created_at"] ?></td>
                </tr>
            <?php } ?>
        </table>

        <h3>Recent Contact Messages</h3>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php while ($message = $messageResult->fetch_assoc()) { ?>
                <tr>
                    <td><?= $message["name"] ?></td>
                    <td><?= $message["email"] ?></td>
                    <td><?= $message["message"] ?></td>
                    <td><?= $message["date"] ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php
        // Fetch announcements
        $announcementResult = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
        ?>
        <br><br><br>
        <h3>Announcements</h3>
        <!-- Form to Add Announcement -->
        <form method="post" action="add_announcement.php" class="mb-3">
            <div class="mb-2">
                <input type="text" name="title" class="form-control" placeholder="Announcement Title" required>
            </div>
            <div class="mb-2">
                <textarea name="content" class="form-control" placeholder="Announcement Content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Announcement</button>
        </form>

        <!-- Display Announcements -->
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($announcement = $announcementResult->fetch_assoc()) { ?>
                <tr>
                    <td><?= $announcement["title"] ?></td>
                    <td><?= $announcement["content"] ?></td>
                    <td><?= $announcement["created_at"] ?></td>
                    <td>
                        <form method="post" action="delete_announcement.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $announcement['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>

<br><br><br>
        <h3>Add New Book (Dynamic)</h3>
        <form method="post" action="add-book.php" enctype="multipart/form-data" class="mb-3">
            <div class="mb-2">
                <input type="text" name="title" class="form-control" placeholder="Book Title" required>
            </div>
            <div class="mb-2">
                <input type="number" name="price" step="0.01" class="form-control" placeholder="Price" required>
            </div>
            <div class="mb-2">
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add Book</button>
        </form>




        <h3 class="mt-5">Manage Uploaded Books</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php
            $bookQuery = $conn->query("SELECT * FROM books");
            while ($book = $bookQuery->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $book['id'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td>$<?= $book['price'] ?></td>
                    <td><img src="../books-img/<?= $book['image'] ?>" width="50"></td>
                    <td>
                        <a href="edit-book.php?id=<?= $book['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete-book.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>


    </div>
</body>

</html>