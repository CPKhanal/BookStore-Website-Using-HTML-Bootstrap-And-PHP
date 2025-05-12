<?php
session_start(); // Start session to keep track of the logged-in user

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get email and password from the POST request
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Database credentials
    // $servername = 'localhost';
    // $username = 'root';
    // $db_password = '';
    // $dbname = 'bookstore';

    // Create a connection to the database
    // $conn = new mysqli($servername, $username, $db_password, $dbname);
    include('db_connection.php');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to fetch the user based on email
    $stmt = $conn->prepare("SELECT * FROM `userdetails` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the password entered by the user
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_logged_in'] = true;
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            


            // Redirect to the index page after successful login
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid password
            echo "Incorrect password!";
        }
    } else {
        // No user found with the provided email
        echo "No user found with that email!";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
