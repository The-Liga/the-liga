<? include '../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Navbar </title>
</head>
<body>
         <header>
<!-- Add this right after the opening <body> tag, before the header -->
<div class="promo-banner">
    <div class="promo-container">
        <div class="promo-slider">
            <div class="promo-slide">DRESS WATCH FLASH SALE | 40% OFF <a href="./pages/products.php"" class="shop-now-btn">SHOP NOW</a></div>
            <div class="promo-slide">FREE SHIPPING OVER R100 ZAR & EASY RETURNS </div>
            <div class="promo-slide">NEW ARRIVALS - SPRING COLLECTION <a href="./pages/products.php"" class="shop-now-btn">SHOP NOW</a></div>
        </div>
        <button class="promo-nav prev">&#10094;</button>
        <button class="promo-nav next">&#10095;</button>
    </div>
</div>
<br><br><br><br>
         <div class="nav-container">
             <!-- Logo -->
             <div class="logo">
                 <a href="../index.php"><img src="assets/log2.jpg" alt="TL"></a>
             </div>
             <!-- Navigation Menu -->
             <nav class="main-nav">
                 <ul>
                     <li><a href="./pages/men.html">Men</a></li>
                     <li><a href="./pages/Women.html">Women</a></li>
                     <li><a href="./pages/new_arrivals.html">New Arrivals</a></li>
                     <li><a href="./pages/new_arrivals.html">Fashion</a></li>
                     <li><a href="./pages/accessories.html">Accessories</a></li>
                     <li><a href="./pages/shoes.html">Shoes</a></li>
                     <li><a href="../pages/Our story.html">Brand</a></li>
                 </ul>

                 <div class="hamburger-menu" id="hamburger-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
             </nav>
             <!-- Icons and Profile -->
             <div class="nav-icons">
                 <a href="#" id="search-icon"><i class="fa fa-search"></i></a>
                 <a href="#" id="cart-icon"><i class="fa fa-shopping-cart"></i><span id="cart-count">0</span></a>
                 <a href="#" id="wishlist-icon"><i class="fa fa-heart"></i><span id="wishlist-count">0</span></a>
                 <!-- Profile Dropdown -->
                 <div class="profile-dropdown">
                    <a href="#" id="profile-link">
                        <?php 
                        // Check if the user is logged in
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                            if ($row = mysqli_fetch_array($query)) {
                                // Display the first name
                                echo $row['firstName'];
                            }
                        } else {
                            // Display "Username" if not logged in
                            echo '<p style="margin-top: 12px;" class="username">Username</p>';
                        }
                        ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <a href="./pages/registrations.php"><i class="fa fa-user"></i> Profile</a>
                        <a><i class="fa fa-list"></i> My Orders</a>
                        <a><i class="fa-solid fa-bag-shopping"></i> Checkout</a>
                        <a href="./pages/logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>

             </div>
         </div>
         <!-- Search Bar (Initially hidden) -->
         <div class="search-bar" id="search-bar" style="display:none;">
             <input type="text" placeholder="Search for products..." />
             <button type="button" id="search-btn">Search</button>
         </div>
     </header>
</body>
</html>