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
                    <div class="promo-slide">DRESS WATCH FLASH SALE | 40% OFF <a href="./pages/products.php" class=" shop-now-btn">SHOP NOW</a></div>
                    <div class="promo-slide">FREE SHIPPING OVER R100 ZAR & EASY RETURNS </div>
                    <div class="promo-slide">NEW ARRIVALS - SPRING COLLECTION <a href="./pages/products.php" class=" shop-now-btn">SHOP NOW</a></div>
                </div>
                <button class="promo-nav prev">&#10094;</button>
                <button class="promo-nav next">&#10095;</button>
            </div>
        </div>

        <br><br><br><br><br>
    
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
                <li><a href="./pages/kids.html">Kids</a></li>
                <li><a href="./pages/shoes.html">Shoes</a></li>
                <li><a href="./pages/Our story.html">Brand</a></li>
            </ul>
        </nav>
        
        <!-- Icons and Profile -->
<div class="nav-icons">
   <!-- Sale GIF Icon -->
<a href="#" id="sale-icon">
    <img src="./assets/sale.gif" alt="Sale Icon" class="gif-icon">
</a>
    
    <!-- Search Icon -->
    <a href="#" id="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
    </a>
    
    <!-- Cart Icon -->
    <a href="#" id="cart-icon">
        <i class="fa-solid fa-cart-shopping"></i>
        <span id="cart-count">0</span>
    </a>
    
    <!-- Wishlist Icon -->
    <a href="#" id="wishlist-icon">
        <i class="fa-solid fa-heart"></i>
        <span id="wishlist-count">0</span>
    </a>
    
    <!-- Profile Dropdown -->
    <div class="profile-dropdown">
        <a href="#" id="profile-link">
            <?php
            echo '<i class="fa-solid fa-user"></i>';
            ?>
        </a>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            if ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="dropdown-menu" id="dropdown-menu">
                <a><i class="fa fa-user"></i> <?php echo $row['username']; ?></a>
                <a><i class="fa fa-list"></i> My Orders</a>
                <a><i class="fa-solid fa-bag-shopping"></i> Checkout</a>
                <a href="./pages/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        <?php
            }
        } else {
        ?>
            <div class="dropdown-menu" id="dropdown-menu">
                <a class="for-btn" href="./pages/registers.php">
                    <button class="btn">SignUp</button>
                </a>
                <a class="for-btn" href="./pages/login.php">
                    <button class="login">LogIn</button>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>

            
            <!-- Hamburger Menu (moved here) -->
            <div class="hamburger-menu" id="hamburger-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
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