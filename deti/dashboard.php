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
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

// Insert data into the database
$sql = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo "<script>alert('Login Successful!');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
 </nav>

		  <div class="card1">
			<div class="card-header">
			    <br><br><br><br><br><br><br><br><br><br>
                <h1>Log In as Administrator</h1>
            </div>
			<div class="card-body">
			<form action="connect.php" method="post">
				<div class="form-group">
				  <label for="username">Username:</label>
				  <input required="" class="form-control" name="username" id="username" type="text">
				</div>
				<div class="form-group">
				  <label for="password">Password:</label>
				  <input required="" class="form-control" name="password" id="password" type="password">
				</div>
			   <input type="submit" class="btn" value="submit"> 
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div> 
			</form>
			</div>
		  </div>
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