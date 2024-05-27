<?php
// Include database connection
include_once 'db_connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Retrieve user from database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, verify password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
        // Start session or set cookies to maintain login state
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "User not found!";
}

// Close database connection
mysqli_close($conn);
?>
