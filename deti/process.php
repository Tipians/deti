<?php
include "connection.php";

if(isset($_POST["update"])) {
    $productname = $_POST["productname"];
    $productprice = $_POST["productprice"];

    // Perform the update in the database
    mysqli_query($link, "UPDATE product SET productprice='$productprice' WHERE productname='$productname'") or die(mysqli_error($link));

    // Redirect back to shop.html
    header("Location: product.php");
    exit();
}
?>