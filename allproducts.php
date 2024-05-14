<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>

    <link rel="stylesheet" href="allproducts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>

<?php 

    $select = mysqli_query($conn, "SELECT * FROM products");

?>

<div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>ID Product</th>
            <th>Product Name</th>
            <th>Product Desc</th>
            <th>Product Price</th>
            <th>Product Image</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['id_product']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['product_desc']; ?></td>
            <td>RM<?php echo $row['price']; ?></td>
            <td><img src="images/<?php echo $row['image_url']; ?>" height="100" alt=""></td>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>



