<?php
require '/scripts/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $db = getMongoDB();
    $collection = $db->users;

    $existingUser = $collection->findOne(['email' => $username]);

    if ($existingUser) {
        echo "User already exists!";
    } else {
        $result = $collection->insertOne([
            'email' => $username,
            'password' => $password
        ]);

        if ($result->getInsertedCount() === 1) {
            echo "Registration successful!";
        } else {
            echo "Failed to register.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
