<?php
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$con = new mysqli("localhost", "root", "", "orbiter");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM products WHERE gender = 'Male'";
if ($brand) {
    $sql .= " AND brand = '" . $con->real_escape_string($brand) . "'";
}
$sql .= " LIMIT $limit OFFSET $offset";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-lg-4">
            <div class="item">
                <div class="thumb">
                    <div class="hover-content">
                        <ul>
                            <li><a href="product' . $row['pID'] . '.html"><i class="fa fa-eye"></i></a></li>
                            <li><a href="product' . $row['pID'] . '.html"><i class="fa fa-star"></i></a></li>
                            <li><a href="product' . $row['pID'] . '.html"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <img src="uploads/' . $row['pimg1'] . '" alt="">
                </div>
                <div class="down-content">
                    <h4 style="text-transform: uppercase;">' . $row['pname'] . '</h4>
                    <span>$' . $row['price'] . '</span>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<div class="col-lg-12"><p>No products found</p></div>';
}

$con->close();
?>
