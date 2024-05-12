<?php
session_start(); // Start the session to access cart data
include "connection.php"; // Include your database connection file

// Fetch products from the database
$res = mysqli_query($link, "select * from product");
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);

// Check if the form is submitted to add products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    // Get the product ID from the form
    $product_id = $_POST['product_id'];

    // Fetch the product details from the database based on the ID
    $product_query = mysqli_query($link, "select * from product where id='$product_id'");
    $product_data = mysqli_fetch_assoc($product_query);

    // Add the product to the cart (you can implement this according to your cart structure)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    array_push($_SESSION['cart'], $product_data);
}

// Handle cart item removal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
    $remove_id = $_POST['remove_item'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    // Re-index the cart array after removal
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!---------stylesheet------------------->
    <link rel="stylesheet" href="style.css"/>
<!--using JQuery--------------->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!-------fav-c------->
    <link rel="shortcut icon" href="Pictures/BENEDETTI_WHITE.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-----using fontawesome-------------------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
					<img src="Pictures/BENEDETTI_WHITE.png">
                </div>
                <nav>
                    <ul>
                        <li><a href="signup.php">Home</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="AboutUs1.html">About Us</a></li>
                        <li><a href="ContactUs1.html">Contact Us</a></li>
                    </ul>
                    <!-------------right-menu--------------->
                        <div class="right-menu">
                           
                            
                            <a class="cart" href="cart.php">
                            <i class="fas fa-shopping-cart">
								<span class="num-cart-product">0</span>
                            </i>
                            </a>
                     </div>
                </nav>



      
            </div>
        </div>
    </div>

        </div>

            </div>
    </div>

<!------------------------Products------------------->

	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">


				<!-- End Column 1 -->

				<!-- Start Column 2 -->
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product1.php">
      <br><br><br><br>
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">All PRODUCTS</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>

				<!-- End Column 2 -->

				<!-- Start Column 3 -->
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product2.php">
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">Burgers</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>
				<!-- End Column 3 -->

				<!-- Start Column 4 -->
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product3.php">
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">Deserts</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>
				<!-- End Column 4 -->
        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product4.php">
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">Wings</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>

<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product5.php">
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">Drinks</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <a class="product-item" href="product6.php">
        <img src="Pictures/BENEDETTI_WHITE.png" class="img-fluid product-thumbnail">
        <h3 class="product-title">Sides</h3>
        <span class="icon-cross">
        </span>
    </a>
</div>
			</div>
		</div>
	</div>
	<!-- End Product Section -->

<!-------------footer------------------->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
				<h2>Benedetti Burgers</h2>
				<h3>Know more:</h3>
				<ul>
					<li>Coupons</li>
					<li>Blog Post</li>
					<li>Return Policy</li>
				</ul>
			</div>
		<div class="footer-col-2">
		  <img src="Pictures/BENEDETTI_WHITE.png">
		  <p></p>
			</div>
		<div class="footer-col-3">
			<h3>Follow us</h3>
			<ul>
					<li><a href="https://www.facebook.com/benedetti.burgers/">Facebook</a></li>
					<li><a href="https://twitter.com/benedetti.burgers/">Twitter</a></li>
					<li></li><a href="https://www.instagram.com/benedetti.burgers/">Instagram</a></li>
				</ul>
			 </div>
			<div class="footer-col-4">
  <div class="services-box">
	  <i class="fas fa-shipping-fast"></i>
	  <span>Fast Delivery</span>
	  <p>Fast Delivery in Metro Manila</p>
  </div>
			</div>
  <div class="services-box">
	  <i class="fas fa-headphones-alt"></i>
	  <span>Open 24/7</span>
	  <p>We support 24hrs a day</p>
  </div>
		</div>
		<hr>
		<p class="copyright">Copyright 2024 - Group 2</p>
	</div>
</div>


<script src="cart.js"></script>
        <!-----jQuery---------------->
<script src="jQuery.js"></script>
<!---script-------------------------->
      <script type="text/javascript">

/*-----For Search Bar-----------------------------*/
    $(document).on('click','.search',function(){
        $('.search-bar').addClass('search-bar-active')
    });

    $(document).on('click','.search-cancel',function(){
        $('.search-bar').removeClass('search-bar-active')
    });

/*---For Login and Sign-up----------------------------*/
    $(document).on('click','.user,.already-account',function(){
        $('.form').addClass('login-active').removeClass('sign-up-active')
    });

    $(document).on('click','.sign-up-btn',function(){
        $('.form').addClass('sign-up-active').removeClass('login-active')
    });

    $(document).on('click','.form-cancel',function(){
        $('.form').removeClass('login-active').removeClass('sign-up-active')
    });


      </script>

<script src="custom.js"></script>



</body>
</html>
<script type="text/javascript" src="prodhead.js"></script>