<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to a desired location (e.g., the login page)
header("Location: index.php"); // Replace "login.php" with the actual login page URL

?>
