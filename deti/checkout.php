<?php
session_start(); // Start session to access cart data
include "connection.php"; // Include your database connection file

// Check if the form is submitted to add products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    // Get the product ID from the form
    $product_id = $_POST['product_id'];

    // Fetch the product details from the database based on the ID
    $product_query = mysqli_query($link, "SELECT * FROM product WHERE id='$product_id'");
    $product_data = mysqli_fetch_assoc($product_query);

    // Add the product to the cart session array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    array_push($_SESSION['cart'], $product_data);
}

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

// Check if form data is present before processing
if (isset($_POST['category_id']) && isset($_POST['productname']) && isset($_POST['productprice'])) {
    // Get user input from the form
    $category_ids = $_POST['category_id']; // Retrieve as array
    $productnames = $_POST['productname']; // Retrieve as array
    $productprices = $_POST['productprice']; // Retrieve as array

    // Loop through the arrays and insert each product into the database
    for ($i = 0; $i < count($category_ids); $i++) {
        $category_id = $category_ids[$i];
        $productname = $productnames[$i];
        $productprice = $productprices[$i];

        // Insert data into the database for each product
        $sql = "INSERT INTO carts (category_id, productname, productprice) VALUES ('$category_id', '$productname', '$productprice')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

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



<div class="row">
    <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Billing Details</h2>
        <div class="p-3 p-lg-5 border bg-white">
            <form action="order_details.php" method="post">    
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="text-black" for="firstname">First name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="col-md-6">
                        <label class="text-black" for="lastname">Last name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="text-black" for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="text-black" for="zip">Postal / Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip">
                    </div>
                    <div class="col-md-6">
                        <label class="text-black" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>

                    <div class="col-md-6">
                        <label class="text-black" for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="col-md-6">
                        <label class="text-black" for="payment">Mode of Payment</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gcash" name="payment" value="Gcash">
                            <label class="form-check-label" for="gcash">Gcash</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cash_on_delivery" name="payment" value="Cash on Delivery">
                            <label class="form-check-label" for="cash_on_delivery">Cash on Delivery</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-black" for="notes">Order Notes</label>
                    <textarea name="notes" class="form-control" id="notes" cols="30" rows="5"></textarea>
                </div>
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
            <div class="col-md-8"> <!-- Adjusted grid classes -->
                <div class="border bg-white p-4">
                    <h2 class="text-black h4 text-uppercase">Cart Totals</h2>
                    <h3 class="text-black h5">Delivery Fee: ₱70</h3>
                    <div class="text-right mb-3">
                        <strong class="text-black">Total: ₱<?php echo $total_price; ?></strong>
                    </div>
                    <form action="order_details.php" method="post">    
                        <button type="submit" class="btn btn-primary-hover-outline btn-block">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


          
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