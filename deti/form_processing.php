<?php
include "connection.php";

if (isset($_POST["insert"])) {
    // Your existing insert logic
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./images/" . $tm . $fnm;
    $dst1 = "images/" . $tm . $fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

    mysqli_query($link, "INSERT INTO product VALUES (NULL, '$_POST[category_id]','$_POST[productname]', '$_POST[description]', '$_POST[productprice]', '$_POST[inventory]', '$dst1')");

    // Redirect to shop.php using GET method
    header("Location: admin.php?inserted=true");
    exit();
}