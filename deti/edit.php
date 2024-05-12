<?php
include "connection.php";
$id = $_GET["id"];
$category_id = "";
$productname = "";
$description = "";
$productprice = "";

$res = mysqli_query($link, "select * from product where Id=$id");
while ($row = mysqli_fetch_array($res)) {
    $productname = $row["productname"];
    $productprice = $row["productprice"];
}
?>

<html lang="en">
<head>
    <title>SHOP MAINTENANCE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


  
    
    <div class="container">
        <div class="col-lg-4">
            <h2>EDIT SHOP MAINTENANCE</h2>
            <form action="" name="form1" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Product Name</label>
                    <input type="text" class="form-control" id="productname" placeholder="Enter productname" name="productname" value="<?php echo $productname; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Category</label>
                    <input type="text" class="form-control" id="category_id" placeholder="Enter category" name="category" value="<?php echo $category_id; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo $description; ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Product Price</label>
                    <input type="text" class="form-control" id="productprice" placeholder="Enter productprice" name="productprice" value="<?php echo $productprice; ?>">
                </div>

                <div class="form-group">
                    <label for="pwd">Images</label>
                    <input type="file" class="form-control" name="f1">
                </div>

                <button type="submit" name="update" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>

</body>

<?php
if (isset($_POST["update"])) {
    // Handle file upload for the image
    if ($_FILES["f1"]["name"] != "") {
        $tm = md5(time());
        $fnm = $_FILES["f1"]["name"];
        $dst = "./images/" . $tm . $fnm;
        $dst1 = "images/" . $tm . $fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

        // Update the product information including the new image
        mysqli_query($link, "update product set productname='$_POST[productname]', productprice='$_POST[productprice]', images='$dst1' where id=$id");
    } else {
        // Update the product information without changing the image
        mysqli_query($link, "update product set productname='$_POST[productname]', productprice='$_POST[productprice]' where id=$id");
    }
    ?>
    <script type="text/javascript">
        window.location = "connect.php";
    </script>
    <?php
}
?>

</html>