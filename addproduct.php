<?php

@include 'config.php';

if(isset($_POST['add_product'])){

    $id_product = $_POST['id_product'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $image_url = $_FILES['image_url']['name'];
    $image_url_tmp_name = $_FILES['image_url']['tmp_name'];
    $image_url_folder = 'images/'.$image_url;

    if(empty($id_product) || empty($product_name) || empty($product_desc) || empty($price) || empty($image_url)){
        $message[] = 'please fill out all';
    }else{
        $insert = "INSERT INTO products(id_product, product_name, product_desc, price, image_url) VALUES('$id_product', '$product_name', '$product_desc', '$price', '$image_url')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($image_url_tmp_name, $image_url_folder);
            $message[] = 'new product added successfully';
        }else{
            $message[] = 'could not add the product';
        }    
        }
    }





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>

    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>


<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
?>

<div class="container">

    <div class="add-product-form-container">

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Add New Product</h3>
            <input type="text" placeholder="Enter Product ID" name="id_product" class="box">
            <input type="text" placeholder="Enter Product Name" name="product_name" class="box">
            <input type="text" placeholder="Enter Product Description" name="product_desc" class="box">
            <input type="text" placeholder="Enter Price of Product" name="price" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="image_url" class="box">
            <input type="submit" class="btn" name="add_product" value="Add Product">
        </form> 
</div>    

</body>
</html>