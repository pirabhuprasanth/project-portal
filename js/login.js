const { MongoClient } = require('mongodb');

// Connection URI
const uri = 'mongodb+srv://pirabhuprasanth:38EyhexZbX6SWa0r@ps8db.m5bzltx.mongodb.net/'; // Replace with your MongoDB URI

// Database Name
const dbName = 'ps8db'; // Replace with your database name

// Create a new MongoClient
const client = new MongoClient(uri);

async function connectToDatabase() {
  try {
    // Connect to the MongoDB cluster
    await client.connect();

    // Access a specific database
    const database = client.db(dbName);
    console.log("Connected to the database");

    // You can perform database operations here

  } catch (error) {
    console.error("Error connecting to the database:", error);
  } finally {
    // Close the connection
    await client.close();
    console.log("Connection closed");
  }
}

// Call the function to connect to the database
connectToDatabase();
