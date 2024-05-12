<?php
// Database connection parameters
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form (use htmlspecialchars for security)
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT username, password FROM register WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // User found, fetch the hashed password
    $stmt->bind_result($dbUsername, $hashedPassword);
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
        // Password is correct, login successful
        // You can redirect the user to connect.php here
        header("Location: connect.php");
        exit();
    } else {
        // Incorrect password
        echo "Incorrect password!";
    }
} else {
    // User not found
    echo "User not found!";
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>