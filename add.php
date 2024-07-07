<?php

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape special characters in the input data
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $brand = mysqli_real_escape_string($con, $_POST["brand"]);
    $color = mysqli_real_escape_string($con, $_POST["color"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $category = mysqli_real_escape_string($con, $_POST["cate"]);
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
                    $imagePaths[] = $fileName;
                } else {
                    $uploadStatus = false;
                    echo "Error uploading file $i.";
                }
            } else {
                $uploadStatus = false;
                echo "File $i is not a valid image or not in allowed format.";
            }
        } else {
            $imagePaths[] = null;
        }
    }

    if ($uploadStatus) {
        $imagePaths = array_pad($imagePaths, 5, null); // Ensure the array has 5 elements
        $sql = "INSERT INTO products (pname, brand, price, color, gender, spec, add_info, Category, pimg1, pimg2, pimg3, pimg4, pimg5) 
                VALUES ('$title', '$brand', '$price', '$color', '$gender', '$spec', '$add_info', '$category',
                        '{$imagePaths[0]}', '{$imagePaths[1]}', '{$imagePaths[2]}', '{$imagePaths[3]}', '{$imagePaths[4]}')";

        if (mysqli_query($con, $sql)) { 
            echo("<script>alert('Product added successfully')</script>");
            header("Location:sellerdashboard.php");
            exit; // Ensure no further code is executed
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Error occurred while uploading images.";
    }
}

$con->close();

?>
