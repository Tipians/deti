<?php

include "connection.php";
// Function to update product inventory
function updateInventory($conn, $product, $quantity) {
    $sql = "UPDATE product SET inventory = inventory -? WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $product);
    if ($stmt->execute()) {
        echo "Inventory updated successfully.";
    } else {
        echo "Error updating inventory: ". $stmt->error;
    }
    $stmt->close();
}

// Check if product ID and quantity are provided in the URL
if (isset($_POST['product']) && isset($_POST['inventory'])) {
    $product = filter_var($_POST['product'], FILTER_VALIDATE_INT);
    $quantity = filter_var($_POST['inventory'], FILTER_VALIDATE_INT);

    // Check connection - assuming $conn is your database connection object
    if (!$conn) {
        die("Connection failed: ". $conn->connect_error);
    }

    // Query to check if the product exists and has sufficient inventory
    $check_sql = "SELECT inventory FROM product WHERE id =?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_inventory = $row['inventory'];

        if ($current_inventory >= $quantity) {
            // Update inventory
            updateInventory($conn, $product, $quantity);
        } else {
            echo "Not enough inventory available for this product.";
        }
    } else {
        echo "Product not found.";
    }

    // Close database connection
    $conn->close();
}

?>

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

<?php

include "connection.php"; // Include your database connection file

// Set the default sort order
$sort = "asc";
if (isset($_GET['sort']) && ($_GET['sort'] == 'desc')) {
    $sort = "desc";
}

// Fetch products from the database based on sort order
$res = mysqli_query($link, "SELECT * FROM product ORDER BY productprice $sort");
$products = mysqli_fetch_all($res, MYSQLI_ASSOC);

// Check if the form is submitted to add products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    // Get the product ID from the form
    $product_id = $_POST['product_id'];

    // Fetch the product details from the database based on the ID
    $product_query = mysqli_query($link, "SELECT * FROM product WHERE id='$product_id'");
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
    
        <!--cancel-btn--->
            </a>

            </div>
            </div>
            </div>
        </div>
    </div>

            </div>
    </div>

<!------------------------Products------------------->
<!-- Display products dynamically -->
<br><br>
  <div class="row justify-content-end mb-3">
    <div class="col-auto">
        <a href="?sort=asc" class="btn btn-primary">Sort by Price (Low to High)</a>
    </div>
    <div class="col-auto">
        <a href="?sort=desc" class="btn btn-primary">Sort by Price (High to Low)</a>
    </div>
</div>
<div class="row justify-content-between mb-3">
    <!-- Add justify-content-between class to space products evenly -->
    <?php foreach ($products as $product) : ?>
        <div class="col-12 col-md-4 col-lg-3 mb-5">
            <div class="product-item">
                <!-- Display product details -->
                <img src="<?php echo $product['images']; ?>" class="product img">
                <h2 class="product-category"><?php echo $product['category_id']; ?></h2>
                <h3 class="product-title"><?php echo $product['productname']; ?></h3>
                <h3 class="product-description"><?php echo $product['description']; ?></h3>
                <strong class="product-price">₱<?php echo $product['productprice']; ?></strong>
                <!-- Add form to add product to cart -->
                <form action="cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    <!-- Cart display section -->

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