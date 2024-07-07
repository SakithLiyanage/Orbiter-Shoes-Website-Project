<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $Rpassword = mysqli_real_escape_string($con, $_POST['Rpassword']);

    // Ensure passwords match
    if ($password !== $Rpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Insert user data into database
        $sql = "INSERT INTO users (Fname, Lname, Email, Phone_no, Username, Password, Rpassword) 
                VALUES ('$firstname', '$lastname', '$email', '$phone', '$username', '$password', '$Rpassword')";

        if (mysqli_query($con, $sql)) {
            echo "<script>
                    alert('Registration Success');
                    window.location.href = 'loginform.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>
