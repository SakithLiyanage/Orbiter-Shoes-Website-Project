<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: loginform.php");
    exit();
}

// Retrieve the username of the logged-in user
$username = $_SESSION['username'];

// Query to fetch the user's details from the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $sql);

// Check if the query executed successfully
if ($result && mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle error if user details not found
    echo "Error fetching user details";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages || Orbiter</title>
    <link rel="icon" href="images/logo1.png">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/sellerdashboard.css">
</head>
<body>
    <!--Nav bar-->
    <nav class="navbar">
        <div class="logo">
            <a href="#"><img src="images/logo1.png" alt="" width="10%"></a>
        </div>
        <div class="navdiv">
            <ul>
                <a href="logout.php"><button class="btn1 logout">Log out <i class="fa-solid fa-right-from-bracket"></i></button></a>
            </ul>
        </div>
    </nav>


    <!--Dashboard container-->
    <div class="welcome-box">
        <h1><span>Welcome back!</span> <?php echo $user['Fname'];?></h1>
        <p>Your account is active and ready to go.</p>
    </div>

    <!--Main content area for messages-->
    <section class="content">
        <div class="messages-list">
            <h2>Messages Received</h2>
            <table width='100%'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                <?php
                $query = "SELECT * FROM messages";
                $result = mysqli_query($con, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['msg'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No messages found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </section>

       <!--Footer -->

       <footer>
        <div class="footer1">
            <center><img src="images/logo1.png" alt="" width="30%">
                <p>"Moving You More"</p><br>
            </center>
        </div>
        
    </footer>

    <div class="copyright">
        <p>&copy; 2024 Orbiter.com || All rights reserved.</p>
    </div>
</body>
</html>
