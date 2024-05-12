<?php
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
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve hashed password from the database for the given username
$sql = "SELECT password FROM register WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, check password
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        // Password is correct, login successful
        echo "Login successful!";
    } else {
        // Incorrect password
        echo "Incorrect password!";
    }
} else {
    // User not found
    echo "User not found!";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Benedetti Burgers</title>
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
                    <li><a href="signup.php">Home</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="AboutUs1.html">About Us</a></li>
                    <li><a href="ContactUs1.html">Contact Us</a></li>
                </ul>
                <div class="right-menu">
                 
                   
                    <a class="cart" href="cart.php">
                    <i class="fas fa-shopping-cart">
                        <span class="num-cart-product">0</span>
                    </i>
                    </a>
             </div>
            </nav>
        </div>
            <div class="row">
                <div class="col-2">
                    <h1>BURGERS</h1>
                    <h1>AT FIRST</h1>
                    <h1>SIGHT</h1>
                    <p>Crazy Meals at Affordable Prices</p>
                    <a href="product.php" class="btn">Buy Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="Pictures/sison.jpg">
                </div>
            </div>
    </div>
</div>
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


    
<!-----------slides---------------->
<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="Slides/SlideWings.jpg">
</div>

<div class="mySlides fade">
  <img src="Slides/SlideBurger.jpg">
</div>

<div class="mySlides fade">
  <img src="Slides/SlideNOF.jpg">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>
<script src="script.js"></script>
<br>
<!----------Best seller ---------------->
<div class="best-seller">
    <h2 class="title"> Best Sellers</h2>
    <div class="row">
        <div class="col-3">
            <a href="product3.php"><img src="images/mousse (1).png" style="width: 350px; height: 350px"></a>
            <a href="product3.php"><h4>Mousse</h4></a>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                   </div>
                   <p>₱35.00</p>
        </div>
        <div class="col-3">
            <a href="product2.php"><img src="images/chickenBurger (1).png" style="width: 350px; height: 350px"></a>
            <a href="product2.php"><h4>Chicken Burger</h4></a>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-half-o"></i>
                   </div>
                   <p>₱320.00</p>
        </div>
        <div class="col-3">
            <a href="product6.php"><img src="images/onionrings (1).png" style="width: 350px; height: 350px"></a>
            <a href="product6.php"><h4>Onion Rings</h4></a>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-half-o"></i>
                   </div>
                   <p>₱90.00</p>
            </div>
            <div class="col-3">
            <a href="product2.php"><img src="images/sunburger (1).png" style="width: 350px; height: 350px"></a>
            <a href="product2.php"><h4>Sun Burger</h4></a>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                   </div>
                   <p>₱420.00</p>
        </div>
    </div>
</div>
<br>

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
    
        <button class="feedback-btn" onclick="toggleFeedbackForm()">Feedback</button>

        <div class="feedback-form" id="feedbackForm">
            <h2>Feedback Form</h2>
            <form action="submit_feedback.php" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="feedback">Feedback:</label><br>
                <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
        
        <script>
            function toggleFeedbackForm() {
                var feedbackForm = document.getElementById("feedbackForm");
                if (feedbackForm.style.display === "none") {
                    feedbackForm.style.display = "block";
                } else {
                    feedbackForm.style.display = "none";
                }
            }
        
            document.getElementById("feedbackFormContent").addEventListener("submit", function(event){
                event.preventDefault(); // Prevent form submission
                var name = document.getElementById("name").value;
                var feedback = document.getElementById("feedback").value;
                // You can handle sending this feedback data to your server here
                console.log("Name: " + name + ", Feedback: " + feedback);
                // For demonstration, just hiding the form after submission
                document.getElementById("feedbackForm").style.display = "none";
            });
        </script>
    </div>
</div>


</body>
</html>