<?php

@include 'config.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch the user's profile information
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $profile = $result->fetch_assoc();
} else {
    echo "No profile found for username: $username";
    exit();
}

// Assign profile data to variables
$email = isset($profile['email']) ? $profile['email'] : '';
$phone = isset($profile['phone']) ? $profile['phone'] : '';
$location = isset($profile['location']) ? $profile['location'] : '';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller dashboard</title>

    <link rel="stylesheet" href="sellerdashboard.css">

    <link  rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM4nXXFmHMkNtyXY5rY_w-msR0biXqhdw&libraries=places"></script>
    <script>
        function initMap() {
            var locationString = "<?php echo htmlspecialchars($location); ?>";
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ 'address': locationString }, function(results, status) {
                if (status === 'OK') {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: results[0].geometry.location
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
        :root {
            --poppins: 'Poppins', sans-serif;
            --lato: 'Lato', sans-serif;
            --primary-bg: #fff;
            --primary-color: #f9f2f2;
            --secondary-color: #fff;
            --sidebar-bg: black;
            --sidebar-active-bg: black;
            --sidebar-hover-color: purple;
            --sidebar-text-color: white;
            --sidebar-item-bg: black;
            --profile-bg: black;
            --profile-border: #ddd;
            --profile-shadow: rgba(0, 0, 0, 0.1);
            --profile-padding: 20px;
            --map-height: 400px;
}

        .profile-container {
            background-color: var(--profile-bg);
            padding: var(--profile-padding);
            border-radius: 10px;
            box-shadow: 0 2px 4px var(--profile-shadow);
            margin: 20px auto;
            max-width: 600px;
            text-align: left;
            position: relative;
            z-index: 1;
}

.profile-container h2 {
    margin-top: 0;
    font-family: var(--poppins);
    color: var(--primary-color);
    text-align: center;
}

.profile-info p {
    margin: 10px 0;
    font-size: 1.1em;
    color: var(--secondary-color);
}

.profile-info strong {
    font-weight: bold;
    color: var(--primary-color);
}
    </style>  
</head>
<body onload="initMap()">
	<div class="container">
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bx-world'></i>
                <span class="text">SellerHub</span>
            </a>
            <ul class="side-menu">
                <li>
                    <a href="allproducts.php">
                        <i class='bx bxs-shopping-bags'></i>
                        <span class="text">All Products</span>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php">
                        <i class='bx bx-plus'></i>
                        <span class="text">Add Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-message-dots'></i>
                        <span class="text">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="logout">
                        <i class='bx bxs-log-out-circle'></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <h1>Welcome, <?php echo htmlspecialchars($username); ?></h1>

            <div class="profile-container">
                <h2>Your Profile Information</h2>
                <div class="profile-info">
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($profile['username']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($profile['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($profile['phone']); ?></p>
                    <p><strong>Preffered Location:</strong> <?php echo htmlspecialchars($profile['location']); ?></p>
                </div>
                <div id="map"></div>
            </div>
        </section>
    </div>
	

	




<script src="java.js"></script>

</body>
</html>