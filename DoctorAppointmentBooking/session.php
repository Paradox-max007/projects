<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login-main.php");
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "appointment";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Access the 'id' session variable
$user_id = $_SESSION['id'];

// Perform a database query or other operations here
// For example, you can fetch user details from the database using $user_id.

// Display a welcome message
echo "Welcome, User with ID: $user_id";

// Close the database connection
$conn->close();
?>
