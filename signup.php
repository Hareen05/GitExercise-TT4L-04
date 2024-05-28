<?php

@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "Username already exists.";
    } else {
        // Insert user into database
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Sign up successful. You can now log in.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>

    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="index.php">Log In</a></p>
    </div>



</body>
</html>
