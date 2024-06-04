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
    $delete = mysqli_query($conn, "DELETE FROM products WHERE id_product = '$id_product'");
    
    if($delete){
        header("Location: allproducts.php");
    } else {
        echo "Failed to delete the product.";
    }
} else {
    header("Location: allproducts.php");
}
?>
