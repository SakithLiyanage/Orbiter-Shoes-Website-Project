<?php
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$sortOrder = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : '';
$sortCategory = isset($_GET['sortCategory']) ? $_GET['sortCategory'] : '';

$con = new mysqli("localhost", "root", "", "orbiter");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM products WHERE gender = 'Male'";
if ($brand) {
    $sql .= " AND brand = '" . $con->real_escape_string($brand) . "'";
}
if ($sortCategory) {
    $sql .= " AND category = '" . $con->real_escape_string($sortCategory) . "'";
}
if ($sortOrder) {
    if ($sortOrder == 'low-to-high') {
        $sql .= " ORDER BY price ASC";
    } elseif ($sortOrder == 'high-to-low') {
        $sql .= " ORDER BY price DESC";
    }
} else {
    $sql .= " ORDER BY price ASC";
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
                            <li><a href="product.php?pID=' . $row['pID'] . '"><i class="fa fa-eye"></i></a></li>
                            <li><a href="product.php?pID=' . $row['pID'] . '"><i class="fa fa-star"></i></a></li>
                            <li><a href="product.php?pID=' . $row['pID'] . '"><i class="fa fa-shopping-cart"></i></a></li>
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

// Fetch total product count for pagination
$count_sql = "SELECT COUNT(*) as total FROM products WHERE gender = 'Male'";
if ($brand) {
    $count_sql .= " AND brand = '" . $con->real_escape_string($brand) . "'";
}
if ($sortCategory) {
    $count_sql .= " AND category = '" . $con->real_escape_string($sortCategory) . "'";
}
$count_result = $con->query($count_sql);
$total_products = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_products / $limit);

echo '<input type="hidden" id="total_pages" value="' . $total_pages . '">';
echo '<input type="hidden" id="current_page" value="' . $page . '">';

$con->close();
?>
