<?php
session_start(); // Start the session

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$notes = $_POST['notes'];
// $payment_id = $_POST['payment_id'];
$total_price = $_POST['total_price'];

// Insert data into the database
$sql = "INSERT INTO order_details (firstname, lastname, address, zip, email, phone_number, notes,total_price) VALUES ('$firstname', '$lastname', '$address', '$zip', '$email', '$phone_number', '$notes', '$total_price')";



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | Big Bites Burger</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!---------stylesheet------------------->
    <link rel="stylesheet" href="style.css"/>
<!------------script--------------------->
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="AboutUs.html">About Us</a></li>
                        <li><a href="ContactUs.html">Contact Us</a></li>
                    </ul>
                    <!-------------right-menu--------------->
                        <div class="right-menu">
                            <a href="javascript:void(0)" class="search">
                            <i class="fas fa-search"></i>
                            </a>
                            <a href="javascript:void(0)" class="user">
                            <i class="far fa-user"></i>
                            </a>
                            <a class="cart" href="cart.php">
                            <i class="fas fa-shopping-cart">
								<span class="num-cart-product">0</span>
                            </i>
                            </a>
                     </div>
                </nav>
        <!--search-bar----------------------------------->
            <div class="search-bar">
        <!--search-input------->
            <div class="search-input">
            <!---input---->
            <input type="text" placeholder="Search For Product" name="search" />
        <!--cancel-btn--->
            <a href="" class="search-cancel">
            <i class="fas fa-times"></i>
            </a>

            </div>
            </div>
            </div>
        </div>
    </div>
<!---login-and-sign-up--------------------------------->
    <div class="form">
        <!--login---------->
        <div class="login-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0)" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Log In</strong>
            <!--inputs-->
            <form>
                <input type="email" name="email" placeholder="Example@gmail.com" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="submit" value="Log In"/>
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="#" class="forget">Forget Your Password?</a>
                <a href="javascript:void(0)" class="sign-up-btn">Create Account</a>
            </div>
        </div>
            <!--Sign-up---------->
            <div class="sign-up-form">
                <!--cancel-btn---------------->
            <a href="javascript:void(0)" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
                <strong>Sign Up</strong>
                <!--inputs-->
                <form>
                    <input type="text" name="fullname" placeholder="Full Name" required/>
                    <input type="email" name="email" placeholder="Example@gmail.com" required/>
                    <input type="password" name="password" placeholder="Password" required/>
                    <input type="submit" value="Sign Up"/>
                </form>
                <!--forget-and-sign-up-btn-->
                <div class="form-btns">
                    <a href="javascript:void(0)" class="already-account">
                        Already Have Account?</a>

                </div>
            </div>
    </div>

<!-- Cart section -->
<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form action="checkout.php" method="post"> <!-- Changed action to checkout.php -->
                <div class="site-blocks-table">
                    <table class="table">
                        <!-- Table header -->
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-category">Category Name</th>
                                <th class="product-name">Product Code</th>
                                <th class="product-price">Price</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            <?php
                            $total_price = 0;
                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $index => $cart_item) {
                                    $total_price += $cart_item['productprice'];
                            ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="<?php echo $cart_item['images']; ?>" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-category">
                                            <h2 class="h5 text-black"><?php echo $cart_item['category_id']; ?></h2>
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?php echo $cart_item['productname']; ?></h2>
                                        </td>
                                        <td>₱<?php echo $cart_item['productprice']; ?></td>
                                        <!-- Hidden input fields for each product -->
                                        <input type="hidden" name="category_id[]" value="<?php echo $cart_item['category_id']; ?>">
                                        <input type="hidden" name="productname[]" value="<?php echo $cart_item['productname']; ?>">
                                        <input type="hidden" name="productprice[]" value="<?php echo $cart_item['productprice']; ?>">
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

			<div class="row justify-content-end">
    <div class="col-md-6 offset-md-6"> <!-- Adjusted grid classes -->
        <div class="form-group">
		<?php

$total_price = 0;
$shipping_fee = 70; // Define shipping fee
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $index => $cart_item) {
        $total_price += $cart_item['productprice'];
    }
}

// Add shipping fee to the total price
$total_price += $shipping_fee;
?>

            <br><br><br>
        </div>
  
		<input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

		        </div>
				
		        <div class="col-md-6">
				<div class="row justify-content-end">
                <div class="row">
                    <div class="col-md-13 text-right border-bottom mb-4">
                        <h2 class="text-black h4 text-uppercase">Cart Totals</h2>
						<h3 class="text-black h4 text-uppercase">Delivery Fee: ₱ 70</h3>
                    </div>
                    <div class="col-md-12 text-right">
                        <span class="text-black">Total:</span>
						<form action="order_details.php" method="post">	
                        <strong class="text-black">₱<?php echo $total_price; ?></strong>
                    </div>
					</form>
                </div>
			</div>
		    </div>
		  </div>
		  
	
		  <h2>
    Thank you for ordering from Benedetti Burgers.
</h2>


<!-------------footer------------------->
<div class="footer">
          <div class="container" >
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
</body>
</html>


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>

