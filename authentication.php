<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check username and password against database (you need to implement this)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example: Check against hard-coded credentials
    if ($username === "admin" && $password === "password") {
        // Authentication successful, set session variable
        $_SESSION['loggedin'] = true;
        // Redirect to admin page
        header("Location: ./admin.php");
        exit;
    } else {
        // Authentication failed, redirect back to login page
        header("Location: ./login.php");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to login page
    header("Location: ./login.php");
    exit;
}
?>
