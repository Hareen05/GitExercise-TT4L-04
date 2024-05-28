<?php
// Include the config.php file to establish the database connection
include('config.php');

// Start session
session_start();

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if username and password match
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Set session variables
        $_SESSION['username'] = $username;
        // Redirect to the user dashboard or any other page after successful login
        header("Location: sellerdashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
