<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // // Database credentials (ensure these are correct)
    // $servername = 'localhost';
    // $username = 'root';
    // $db_password = '';
    // $dbname = 'bookstore';

    // // Create a connection
    // $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Include database connection
    include('db_connection.php');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM `userdetails` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        // Prepare the SQL statement to insert new user
        $stmt = $conn->prepare("INSERT INTO `userdetails` (`email`, `password`, `created_at`) VALUES (?, ?, CURRENT_TIMESTAMP)");
        $stmt->bind_param("ss", $email, $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to prevent form resubmission
            header("Location: login.php?status=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<?php
// Include sign-up page here (could be HTML or PHP, depending on the layout)
include "sign-up.php";
?>
