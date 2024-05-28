<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Product</title>

    <link rel="stylesheet" href="find.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>

<section class="products">
    <h1>Available Products</h1>
    <div class="product-grid">
        <?php 
            $select = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($select)){ 
        ?>
            <div class="product-item">
                <img src="images/<?php echo $row['image_url']; ?>" height="100" alt="">
                <h2><?php echo $row['product_name']; ?></h2>
                <p><?php echo $row['product_desc']; ?></p>
                <p>RM<?php echo $row['price']; ?></p>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>
