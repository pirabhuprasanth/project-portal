<?php
require '/scripts/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $db = getMongoDB();
    $collection = $db->users;

    $user = $collection->findOne(['email' => $username]);

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
        // Start a session and set user details, e.g., $_SESSION['user'] = $user;
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid request.";
}
?>
