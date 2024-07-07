<?php
$pID = $_GET['pID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/listing_details.css">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <title>View Details</title>
</head>

<body>
    <?php
    require 'config.php';
    $i = 1;
    $query = "SELECT * FROM products WHERE pID = $pID";
    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<table class='artwork_details' width='70%'>";
            echo "<tr>";
            echo "<td>" . 'Title : ' . "</td>" . "<td>" . $row['pname'] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Brand : ' . "</td>" . "<td>" . $row["brand"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Price : ' . "</td>" . "<td>" . $row["price"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Color : ' . "</td>" . "<td>" . $row["color"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Specifications : ' . "</td>" . "<td>" . $row["spec"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Additional Information : ' . "</td>" . "<td>" . $row["add_info"] . "<br>" . "</td>";
            echo "</tr>";
            // Display images
            echo "<tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['pimg1'] . "' width='400'></td>";
            echo "</tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['pimg2'] . "' width='400'></td>";
            echo "</tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['pimg2'] . "' width='400'></td>";
            echo "</tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['pimg4'] . "' width='400'></td>";
            echo "</tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['pimg5'] . "' width='400'></td>";
            echo "</tr>";
            ?>
            <tr>
                <td>
                    <form action="edit_listing.php" method="GET">
                        <input type="hidden" name="pID" value="<?php echo $row['pID']; ?>">
                        <button type="submit" class='btn2'>Edit Listing <i class='fa-solid fa-pen'></i></button>
                    </form>
                </td>
                <td>
                    <form action="delete_listing.php" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this listing?');">
                        
                        <button type="submit" class='btn1' style="margin-left:0px;">Delete Listing <i class='fa-solid fa-trash'></i></button>
                    </form>
                </td>
            </tr>
            <?php
            echo "</table>";
        }
    } else {
        echo "Error fetching data.";
    }
    ?>
</body>

</html>