<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];

    
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "data";

    // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO feedback_table(name, feedback) VALUES ('$name', '$feedback')";

    if ($conn->query($sql) === TRUE) {

        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>