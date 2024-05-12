<?php
session_start(); // Start session to access cart data
include "connection.php"; // Include your database connection file

// Check if the form is submitted to add products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    // Get the product ID from the form
    $product_id = $_POST['product_id'];

    // Fetch the product details from the database based on the ID
    $product_query = mysqli_query($link, "select * from product where id='$product_id'");
    $product_data = mysqli_fetch_assoc($product_query);

    // Add the product to the cart session array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    array_push($_SESSION['cart'], $product_data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart </title>
    <meta charset="UTF-8">
    <title>About Us </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!---------stylesheet------------------->
    <link rel="stylesheet" href="style.css"/>
<!------------script--------------------->
<!-------fav-c------->
<link rel="shortcut icon" href="Pictures/BENEDETTI_WHITE.png"/>
<!-----using fontawesome-------------------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
</div>


<div class="container mt-5">
        <h2>Your Cart</h2>
        <div class="row">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $index => $cart_product) : ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $cart_product['productname']; ?></h5>
                                <p class="card-text">Price: ₱<?php echo $cart_product['productprice']; ?></p>
                                <form action="product.php" method="post">
                                    <input type="hidden" name="remove_item" value="<?php echo $index; ?>">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Your cart is empty.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<!-- Cart section -->
<!-- Cart section -->
<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
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
            </form>
        </div>
        <!-- Cart total section -->
        <div class="row justify-content-end">
            <div class="col-md-6 col-lg-4 offset-md-6 offset-lg-8"><!-- Adjusted grid classes -->
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-4">
                        <h3 class="text-black h4 text-uppercase">Cart Totals | </h3>
                    </div>
                    <div class="col-md-12 text-right">
                
                        <span class="text-black">Total:</span>
                        <strong class="text-black">₱<?php echo $total_price; ?></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="checkout.php" class="btn btn-black rounded-0 btn-lg btn-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-------------footer------------------->
<div class="footer">
    <div class="container relative">
        
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
</body>
</html>