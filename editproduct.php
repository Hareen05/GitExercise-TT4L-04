<?php
@include 'config.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
    $select = mysqli_query($conn, "SELECT * FROM products WHERE id_product = '$id_product'");
    $row = mysqli_fetch_assoc($select);
} else {
    header("Location: allproducts.php");
    exit();
}

if(isset($_POST['update'])){
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $image_url = $_FILES['image_url']['name'];
    $image_tmp_name = $_FILES['image_url']['tmp_name'];
    $image_folder = 'images/'.$image_url;

    if(empty($image_url)){
        $update = mysqli_query($conn, "UPDATE products SET product_name = '$product_name', product_desc = '$product_desc', price = '$price' WHERE id_product = '$id_product'");
    } else {
        move_uploaded_file($image_tmp_name, $image_folder);
        $update = mysqli_query($conn, "UPDATE products SET product_name = '$product_name', product_desc = '$product_desc', price = '$price', image_url = '$image_url' WHERE id_product = '$id_product'");
    }

    if($update){
        header("Location: allproducts.php");
    } else {
        echo "Failed to update the product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="allproducts.css">

    <style>
        form {
    width: 60%;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form input[type="text"], 
form input[type="file"], 
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

form input[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #218838;
}


    </style>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required>
    <label for="product_desc">Product Description:</label>
    <textarea name="product_desc" required><?php echo $row['product_desc']; ?></textarea>
    <label for="price">Product Price:</label>
    <input type="text" name="price" value="<?php echo $row['price']; ?>" required>
    <label for="image_url">Product Image:</label>
    <input type="file" name="image_url">
    <input type="submit" name="update" value="Update Product">
</form>

</body>
</html>
