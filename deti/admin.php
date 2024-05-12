<?php
include "form_processing.php";

// Additional logic to redirect to shop.php after form processing
if (isset($_POST["insert"])) {
    // Your existing insert logic
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./images/" . $tm . $fnm;
    $dst1 = "images/" . $tm . $fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

    mysqli_query($link, "insert into product values(NULL, '$_POST[category_id]','$_POST[productname]', '$_POST[description]','$_POST[productprice]','$dst1')");

    // Redirect to shop.php
   // header("Location: shop.php");
    //exit();
}
?>

<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

  
    
</nav>
    <div class="container">
        <div class="col-lg-4">
            <h2>SHOP MAINTENANCE</h2>
            <form action="admin.php" name="form1" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="pwd">Category</label>
                    <input type="text" class="form-control" id="category_id" placeholder="Enter category_id" name="category_id">
                </div>
                <div class="form-group">
                    <label for="text">Product name</label>
                    <input type="text" class="form-control" id="productname" placeholder="Enter productname" name="productname">
                </div>
                <div class="form-group">
                    <label for="text">description:</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                </div>
                <div class="form-group">
                    <label for="text">Product Price</label>
                    <input type="text" class="form-control" id="productprice" placeholder="Enter productprice" name="productprice">
                </div>
                <div class="form-group">
                    <label for="text">Images</label>
                    <input type="file" class="form-control" name="f1">
                </div>
                <div class="form-group">
                    <label for="pwd">Inventory</label>
                    <input type="text" class="form-control" id="inventory" placeholder="Enter inventory" name="inventory">
                </div>
                <button type="submit" name="insert" class="btn btn-default" href="admin.php">Insert</button>
            </form>
        </div>
    </div>

    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Images</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Product Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Inventory</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($link, "select * from product");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>"; echo $row["id"]; echo "</td>";
                    echo "<td>"; ?> <img src="<?php echo $row["images"]; ?>" height="100" width="100"> <?php echo "</td>";
                    echo "<td>"; echo $row["category_id"]; echo "</td>";
                    echo "<td>"; echo $row["productname"]; echo "</td>";
                    echo "<td>"; echo $row["description"]; echo "</td>";
                    echo "<td>"; echo $row["productprice"]; echo "</td>";
                    echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"<button type="button" class="btn-success">Edit</button></a> <?php echo "</td>";
                    echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"<button type="button" class="btn-danger">Delete</button></a> <?php echo "</td>";
                    echo "<td>"; echo $row["inventory"]; echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>