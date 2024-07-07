<?php
session_start();

// Include the database connection file
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to retrieve user data based on username
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        // Error handling for SQL query
        echo "Error: " . mysqli_error($con);
        exit();
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if ($password == $row['Password']) { 
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['role'];
            // Redirect based on role
            if ($row['role'] == 'user') {
                header("Location: index_login.php");
                exit();
            } elseif ($row['role'] == 'admin') {
                header("Location: sellerdashboard.php");
                exit();
            } else {
                // Handle other roles or unexpected values
                echo "Invalid role";
                exit();
            }
        } else {
            // Password is incorrect
            echo "Invalid password";
            exit();
        }
    } else {
        // Username not found
        echo "User not found";
        exit();
    }
}

mysqli_close($con);
?>
