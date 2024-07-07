<?php

session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pID = $_POST["pID"];
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $brand = mysqli_real_escape_string($con, $_POST["brand"]);
    $cate = mysqli_real_escape_string($con, $_POST["cate"]);
    $color = mysqli_real_escape_string($con, $_POST["color"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $price = mysqli_real_escape_string($con, $_POST["price"]);
    $spec = mysqli_real_escape_string($con, $_POST["spec"]);
    $add_info = mysqli_real_escape_string($con, $_POST["add_info"]);

    $targetDir = "uploads/";
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    $uploadStatus = true;
    $imagePaths = array();

    // Create the uploads directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    for ($i = 1; $i <= 5; $i++) {
        if (isset($_FILES["image$i"]) && $_FILES["image$i"]["error"] == 0) {
            $fileName = uniqid() . "-" . basename($_FILES["image$i"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["image$i"]["tmp_name"]);
            if ($check !== false && in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["image$i"]["tmp_name"], $targetFilePath)) {
                    $imagePaths["pimg$i"] = $fileName;
                } else {
                    $uploadStatus = false;
                    echo "Error uploading file $i.";
                }
            } else {
                $uploadStatus = false;
                echo "File $i is not a valid image or not in allowed format.";
            }
        }
    }

    if ($uploadStatus) {
        $updateFields = "pname='$title', brand='$brand', Category='$cate', price='$price', color='$color', spec='$spec', add_info='$add_info', gender='$gender'";
        foreach ($imagePaths as $column => $path) {
            $updateFields .= ", $column='$path'";
        }

        $sql = "UPDATE products SET $updateFields WHERE pID=$pID";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product updated successfully'); window.location.href = 'sellerdashboard.php';</script>";
        } else {
            echo "Error updating listing: " . mysqli_error($con);
        }
    } else {
        echo "Error occurred while uploading images.";
    }
}

$con->close();

?>
