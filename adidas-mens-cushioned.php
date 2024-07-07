<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" href="images/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Discover premium footwear at Orbiter Shoes Shop. Explore a diverse range of stylish and comfortable shoes for men and women. Shop now for quality and style that fits your active lifestyle.">
    <meta name="author" content="Orbiter Shoes">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Shop | Orbiter</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets2/css/font-awesome.css">
    <link rel="stylesheet" href="assets2/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets2/css/owl-carousel.css">
    <link rel="stylesheet" href="assets2/css/lightbox.css">
    <style>.header-area.header-sticky { min-height: 150px; }</style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="images/logo1.png" width="20%">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="margin-top: -50px;">
                            <li class="scroll-to-section"><a href="index.php">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Mens</a>
                                <ul>
                                    <li><a href="mens-cushioned.php">Cushioned / Neutral</a></li>
                                    <li><a href="mens.php">Spikes</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Womens</a>
                                <ul>
                                    <li><a href="womens-cushioned.php">Cushioned / Neutral</a></li>
                                    <li><a href="womens-spikes.php">Spikes</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="contact.php">Contact Us</a></li>
                            <li class="scroll-to-section"><a href="about.html">About Us</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Discover premium footwear at Orbiter Shoes Shop. Explore a diverse range of stylish and comfortable shoes for men and women. Shop now for quality and style that fits your active lifestyle.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <center>
        <div class="brands">
            <a href="nike-mens-cushioned.php">
                <img src="images/Nike-Logo.png" width="10%" style="margin-right: 50px;">
            </a>
            <a href="adidas-mens-cushioned.php">
                <img src="images/adidas-logo-black-and-white-1.png" width="10%" style="margin-right: 50px;">
            </a>
            <a href="asics-mens-cushioned.php">
                <img src="images/asics-logo-black-and-white.png" width="10%" style="margin-right: 50px;">
            </a>
            <a href="mizuno-mens-cushioned.php">
                <img src="images/Mizuno.png" width="10%" style="margin-right: 50px;">
            </a>
            <a href="newbalance-mens-cushioned.php">
                <img src="images/new-balance-logo-black-and-white.png" width="10%" style="margin-right: 50px;">
            </a>
            <a href="puma-mens-cushioned.php">
                <img src="images/puma.png" width="10%" style="margin-right: 50px;">
            </a>
            
            
        </div>
        </center>
    </section>

    <?php
    require 'config.php';

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = 12;
    $offset = ($page - 1) * $limit;

    // Default query to select all products
    $query = "SELECT * FROM products WHERE gender = 'Male' AND brand = 'Adidas' AND Category = 'Cushioned'";

    // Check if a sorting option is selected
    if (isset($_GET['sort'])) {
        $sort_option = $_GET['sort'];
        switch ($sort_option) {
            case 'Price Low to High':
                $query .= " ORDER BY price ASC";
                break;
            case 'Price High to Low':
                $query .= " ORDER BY price DESC";
                break;
            default:
                // Default case, do nothing
                break;
        }
    }

    
    $query .= " LIMIT $limit OFFSET $offset";

    $result = mysqli_query($con, $query);

    // Fetch total product count for pagination
    $count_sql = "SELECT COUNT(*) as total FROM products WHERE gender = 'Male' AND brand = 'Adidas'AND Category = 'Cushioned'";
    if (isset($_GET['category'])) {
        $count_sql .= " AND category = '$category_option'";
    }
    $count_result = mysqli_query($con, $count_sql);
    $total_products = mysqli_fetch_assoc($count_result)['total'];
    $total_pages = ceil($total_products / $limit);
    ?>

    <form method="GET" action="">
        <center>
        Sort By Price
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="" selected disabled>Sort By</option>
            <option value="Price Low to High" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'Price Low to High') echo 'selected'; ?>>Price Low to High</option>
            <option value="Price High to Low" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'Price High to Low') echo 'selected'; ?>>Price High to Low</option>
        </select>

        </center>
    </form>
    <style>
    /* Styling for the sort dropdown */
    select#sort {
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    /* Center align the dropdown */
    form {
        text-align: center;
    }
</style>

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row" id="productContainer">
                <!-- Products will be loaded here via AJAX -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
                    echo "<p>No products found.</p>";
                }
                ?>
            </div>
            <center>
            <div class="pagination">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?><?php if (isset($_GET['sort'])) echo '&sort=' . $_GET['sort']; ?><?php if (isset($_GET['category'])) echo '&category=' . $_GET['category']; ?>"<?php if ($i == $page) echo ' class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div></center>
        </div>
    </section>

    <!-- ***** Products Area Ends ***** -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sort').change(function() {
                var sort = $(this).val();
                window.location.href = "?sort=" + sort;
            });

            $('#category').change(function() {
                var category = $(this).val();
                window.location.href = "?category=" + category;
            });
        });
    </script>

   <!-- ***** Footer Start ***** -->
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="images/logo1.png" width="20%" alt="orbiter, shoes">
                        </div>
                        <ul>
                            <li><a href="#">No.215, Parakum mawatha, Bangalawatta, Kottawa, Sri Lanka </a></li>
                            <li><a href="#">+94 77 495 4573</a></li>
                            <li><a href="#">customercareorbiter@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shoes</a></li>
                        <li><a href="#">Women’s Shoes</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->

    <style>
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        color: #333;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ccc;
        margin: 0 5px;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #333;
        color: #fff;
    }
</style>

    <!-- jQuery -->
    <script src="assets2/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets2/js/popper.js"></script>
    <script src="assets2/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets2/js/owl-carousel.js"></script>
    <script src="assets2/js/accordions.js"></script>
    <script src="assets2/js/datepicker.js"></script>
    <script src="assets2/js/scrollreveal.min.js"></script>
    <script src="assets2/js/waypoints.min.js"></script>
    <script src="assets2/js/jquery.counterup.min.js"></script>
    <script src="assets2/js/imgfix.min.js"></script>
    <script src="assets2/js/slick.js"></script>
    <script src="assets2/js/lightbox.js"></script>
    <script src="assets2/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets2/js/custom.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);
            });
        });
    </script>
</body>
</html>
