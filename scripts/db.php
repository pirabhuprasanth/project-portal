<?php
require 'vendor/autoload.php'; // include Composer's autoloader

function getMongoDB() {
    try {
        $client = new MongoDB\Client("mongodb+srv://pirabhuprasanth:B37pl8zfRlfSS7Bt@ps8db.m5bzltx.mongodb.net/"); // Update with your MongoDB connection string if different
        $db = $client->ps8_network; // Replace 'ps8_network' with your database name
        return $db;
    } catch (MongoDB\Exception\Exception $e) {
        echo "Failed to connect to MongoDB: " . $e->getMessage();
        exit();
    }
}
?>
