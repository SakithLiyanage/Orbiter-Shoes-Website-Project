
<?php
// Database connection
$con = new mysqli("localhost", "root", "", "orbiter");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the product ID from the URL
$product_id = isset($_GET['pID']) ? intval($_GET['pID']) : 0;

// Fetch product details
$sql = "SELECT * FROM products WHERE pID = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orbiter | Product Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="images/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo2.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets2/css/font-awesome.css">
    <link rel="stylesheet" href="assets2/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets2/css/owl-carousel.css">
    <link rel="stylesheet" href="assets2/css/lightbox.css">
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

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
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html">Home</a></li>
                            <li class="scroll-to-section"><a href="shop.html" class="active">Shop</a></li>
                            <li class="scroll-to-section"><a href="contact.html">Contact Us</a></li>
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

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg1']; ?>" alt="<?php echo $product['pname']; ?>" id="product-detail">
                    </div>
                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg1']; ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg2']; ?>" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg3']; ?>" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg4']; ?>" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="uploads/<?php echo $product['pimg5']; ?>" alt="Product Image 5">
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2" style="text-transform: uppercase;"><?php echo $product['pname']; ?></h1>
                            <p class="h3 py-2">$<?php echo $product['price']; ?></p>
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $product['brand']; ?></strong></p>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Color:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $product['color']; ?></strong></p>  
                                                         </ul>

                            <ul class="list-unstyled pb-3">
                                <li><b>Specification:</b> <?php echo $product['spec']; ?></li>
                                <li><b>Additional Information:</b> <?php echo $product['add_info']; ?></li>
                            </ul>

<!-- WhatsApp Button -->
<a href="https://api.whatsapp.com/send?phone=94774954573">
    <button class="filter2">WhatsApp <i class="fab fa-whatsapp"></i></button>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Close Content -->

<!-- ***** Footer Start ***** -->
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="images/logo1.png" alt="orbiter logo" width="20%">
                        </div>
                        <ul>
                            <li><a href="#">No.215, Parakum mawatha, Bangalawatta, Kottawa, Sri Lanka</a></li>
                            <li><a href="#">customercareorbiter@gmail.com</a></li>
                            <li><a href="#">+94 77 495 4573</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="mens.html">Men’s Shoes</a></li>
                        <li><a href="womens.html">Women’s Shoes</a></li>
                        <li><a href="spikes.html">Spikes</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="index.html">Homepage</a></li>
                        <li><a href="about.html">About Us</a></li>
                        
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2024 orbiter.com | All Rights Reserved.
                        
                        <br>Creative web solution By <a href="https://sakithliyanage.github.io/sakithliyanage.com/"
                        target="_parent" title="Sakith Liyanage">Sakith Liyanage</a></p>
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=100088101970376&mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://instagram.com/_orbiter.com_?igshid=MzMyNGUyNmU2YQ=="><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=94774954573"><i class="fa fa-whatsapp"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- jQuery -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>

<!-- Slick Carousel -->
<script src="assets/js/slick.min.js"></script>
<script>
$('#carousel-related-product').slick({
// Slick carousel initialization
});
</script>

<!-- Your additional scripts -->

</body>

</html>

<?php
$stmt->close();
$con->close();
?>
