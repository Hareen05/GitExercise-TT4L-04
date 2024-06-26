<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMU MARKET</title>

    <link rel="stylesheet" href="style.css">

    <link  rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
     

    <header>
        <a href="#" class="logo"><img src="images/image.jpg" alt=""></a>

        

        <ul class="navbar">
            <li><a href="find.php">Find</a></li>
        </ul>

        <div class="nav-icon">
            <i class='bx bx-search' id="search-icon"></i>
            <i class='bx bx-user' id="user-icon"></i>
            <i class='bx bx-cart' id="cart-icon"></i>
        </div>

        <div class="search-bar ">
            <input type="search" name="" id="" placeholder="Search Here">
        </div>

        <div class="user">
            <h2>Seller Login</h2>
            <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" class="login-btn" name="login">
            <p>Don't have an account? <a href="signup.php">Sign Up Now</a></p>
        </div>
        

        


        
        
       
        
        
    </header>

    <section class="main-home">
        <div class="main-text">
            <h1>Marketplace for MMU Students</h1>
            <h3>Used Items for Sale</h3>

            <a href="find.php" class="main-btn">Grab Now <i class='bx bx-right-arrow-alt' ></i></a>
        </div>
    </section>




    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="java.js"></script>

</body>
</html>














