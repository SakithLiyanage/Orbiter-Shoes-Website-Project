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
    // Check if the user is a seller
    if ($user['role'] !== 'admin') {
        // If not a seller, redirect to the index page or appropriate page
        header("Location: index.php"); // Change this to the appropriate page
        exit();
    }
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
    <title>Admin Dashboard || Orbiter</title>
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
        <br>
        <div class="stats">
            <div class="stat">
                <h2>Active Listings <br><i class="fa-solid fa-list"></i><br>
                    <?php
                    $i = 1;
                    $rows = mysqli_query($con, "SELECT COUNT(pID) FROM products");
                    if ($rows) {
                        foreach ($rows as $row):
                            echo $row["COUNT(pID)"] . "<br>";
                        endforeach;
                    } else {
                        echo "Error fetching data.";
                    }
                    ?>
                </h2>
            </div>
            
            <div class="stat last">
            <a href="messages.php" class="message-link">
                <h2>Messages <br><i class="fa-solid fa-list"></i></h2>
            </a>
             <br>
                    <?php
                    $i = 1;
                    $rows = mysqli_query($con, "SELECT COUNT(msgID) FROM messages");
                    if ($rows) {
                        foreach ($rows as $row):
                            echo $row["COUNT(msgID)"] . "<br>";
                        endforeach;
                    } else {
                        echo "Error fetching data.";
                    }
                    ?>
                
            </div>
            
        </div>
    </div>
    <style>
.message-link {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit text color */
}

.message-link:hover {
    text-decoration: none; /* Remove underline on hover */

}

    </style>

    <!--Main content area for dashboard-->
    <section class="content">
        <div class="tabs">
            <button class="btn1" disabled>My Active Listing(s)</button>
            <a href="addnew.php"><button class="btn2">Add a New Listing <i
                        class="fa-regular fa-square-plus"></i></button></a>
        </div><br>
        <div class="listings">
            <table width='100%'>
                <?php
                $i = 1;
                $rows = mysqli_query($con, "SELECT * FROM products");
                if ($rows) {
                    foreach ($rows as $row):
                        ?>
                        <tr>
                            <td style="padding-left:10px;"><?php echo $i++; ?></td>
                            <td width="70%"><?php echo $row["pname"] ?></td>
                            <td><a href="listing_details.php?pID=<?php echo $row['pID']; ?>"><button
                                        class='btn2'>View Details <i class='fa-solid fa-eye'></i></button></a></td>

                            <td>
                                <form action="edit_listing.php" method="GET">
                                    <input type="hidden" name="pID" value="<?php echo $row['pID']; ?>">
                                    <button type="submit" class='btn2'>Edit Listing <i class='fa-solid fa-pen'></i></button>
                                </form>

                            </td>
                            <td>
                                <form action="delete_listing.php" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this listing?');">
                                    <input type="hidden" name="pID" value="<?php echo $row['pID']; ?>">
                                    <button type="submit" class='btn1'>Delete Listing <i class='fa-solid fa-trash'></i></button>
                                </form>

                            </td>
                        <?php endforeach; ?>
                    <?php } else {
                    echo "Error fetching data.";
                }
                ?>

            </table>
        </div>
    </section>
    <br><br>

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
