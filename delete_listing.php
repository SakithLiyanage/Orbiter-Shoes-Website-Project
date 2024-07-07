<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['pID'])) {
        $pID = $_POST['pID'];

        // Delete the listing from the database
        $query = "DELETE FROM products WHERE pID=$pID";
        if (mysqli_query($con, $query)) {
            echo("<script>alert(Product Deleted successful)</script>");
            header("Location:sellerdashboard.php");
        } else {
            echo "Error deleting listing: " . mysqli_error($con);
        }
    } else {
        echo "Product ID not provided.";
    }
}
?>
