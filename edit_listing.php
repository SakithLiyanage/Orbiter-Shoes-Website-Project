<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Listing</title>
    <link rel="stylesheet" href="assets/css/update.css">
</head>

<body>
    <?php
    session_start();
    require 'config.php';

    // Check if product ID is provided
    if (isset($_GET['pID'])) {
        $pID = $_GET['pID'];

        $result = mysqli_query($con, "SELECT * FROM products WHERE pID = $pID");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="add-box">
                <form action="update_listing.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="pID" value="<?php echo $pID; ?>">
                    Title : <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['pname']); ?>" required><br>
                    Brand : <select name="brand" id="brand" required>
                        <option value="Nike" <?php if(isset($row['brand']) && $row['brand'] == 'Nike') echo 'selected'; ?>>Nike</option>
                        <option value="Adidas" <?php if(isset($row['brand']) && $row['brand'] == 'Adidas') echo 'selected'; ?>>Adidas</option>
                        <option value="Asics" <?php if(isset($row['brand']) && $row['brand'] == 'Asics') echo 'selected'; ?>>Asics</option>
                        <option value="Mizuno" <?php if(isset($row['brand']) && $row['brand'] == 'Mizuno') echo 'selected'; ?>>Mizuno</option>
                        <option value="Newbalance" <?php if(isset($row['brand']) && $row['brand'] == 'Newbalance') echo 'selected'; ?>>New Balance</option>
                        <option value="Puma" <?php if(isset($row['brand']) && $row['brand'] == 'Puma') echo 'selected'; ?>>Puma</option>
                        <option value="Underarmour" <?php if(isset($row['brand']) && $row['brand'] == 'Underarmour') echo 'selected'; ?>>Under Armour</option>
                    </select><br>
                    Category : <select name="cate" id="cate" required>
                        <option value="Cushioned" <?php if(isset($row['Category']) && $row['Category'] == 'Cushioned') echo 'selected'; ?>>Cushioned / Neutral</option>
                        <option value="Spikes" <?php if(isset($row['Category']) && $row['Category'] == 'Spikes') echo 'selected'; ?>>Spikes</option>
                        
        </select><br>
                    Color : <input type="text" id="color" name="color" value="<?php echo htmlspecialchars($row['color']); ?>" required><br>
                    Gender : <select name="gender" id="gender" required>
                        <option value="Male" <?php if(isset($row['gender']) && $row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if(isset($row['gender']) && $row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    </select><br>
                    Price : <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required><br>
                    Specifications : <textarea id="spec" name="spec" rows="4" cols="24" required><?php echo htmlspecialchars($row['spec']); ?></textarea><br>
                    Additional Information : <textarea id="add_info" name="add_info" rows="4" cols="24" required><?php echo htmlspecialchars($row['add_info']); ?></textarea><br>

                    Image 1 (Main) : <input type="file" id="image1" name="image1" accept=".jpg, .jpeg, .png"><br>
                    Image 2 : <input type="file" id="image2" name="image2" accept=".jpg, .jpeg, .png"><br>
                    Image 3 : <input type="file" id="image3" name="image3" accept=".jpg, .jpeg, .png"><br>
                    Image 4 : <input type="file" id="image4" name="image4" accept=".jpg, .jpeg, .png"><br>
                    Image 5 : <input type="file" id="image5" name="image5" accept=".jpg, .jpeg, .png"><br>

                    <button type="submit" class="submit" style="width:150px;">Update Listing</button>
                </form>
            </div>
            <?php
        } else {
            echo "Listing not found.";
        }
    } else {
        echo "Product ID not provided.";
    }
    ?>

</body>

</html>
