<?php
// Include database connection
include_once 'db_connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
