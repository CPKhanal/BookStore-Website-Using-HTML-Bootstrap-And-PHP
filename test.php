<?php

function validateInput($email, $password) {
    $errors = [];

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        $errors[] = "Please fill all fields";
    }

    // Email Validation using Regex
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address";
    }

    // Stronger Password Validation
    if (strlen($password) < 8) {
        $errors[] = "Your Password must be at least 8 characters long.";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Your Password must contain at least one uppercase letter.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Your Password must contain at least one lowercase letter.";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Your Password must contain at least one number.";
    }
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errors[] = "Your Password must contain at least one special character.";
    }

    return $errors;
}

// Test cases
$testCases = [
    ["", "", "Both fields empty"],
    ["test", "password", "Invalid email"],
    ["test@", "password", "Invalid email"],
    ["test@test.com", "pass", "Password too short"],
    ["test@test.com", "password", "No uppercase, number, or special char"],
    ["test@test.com", "Password1", "No special char"],
    ["test@test.com", "Password1!", "Valid input"],
];

foreach ($testCases as $test) {
    list($email, $password, $description) = $test;
    $errors = validateInput($email, $password);
    echo "<strong>Test: $description</strong><br>";
    if (empty($errors)) {
        echo "✅ Passed!<br>";
    } else {
    }
    echo "<hr>";
}
?>
