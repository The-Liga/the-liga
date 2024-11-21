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
         <div class="nav-container">
             <!-- Logo -->
             <div class="logo">
                 <a href="../index.php"><img src="assets/log2.jpg" alt="TL"></a>
             </div>
             <!-- Navigation Menu -->
             <nav class="main-nav">
                 <ul>
                     <li><a href="./pages/men.html">Men</a></li>
                     <li><a href="./pages/women.html">Women</a></li>
                     <li><a href="./pages/new_arrivals.html">New Arrivals</a></li>
                     <li><a href="./pages/new_arrivals.html">Fashion</a></li>
                     <li><a href="./pages/accessories.html">Accessories</a></li>
                     <li><a href="./pages/shoes.html">Shoes</a></li>
                     <li><a href="./pages/shop.html">Shop</a></li>
                 </ul>
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
                            echo '<p style="margin-top: 12px;" class="username"><button>Register</button></p>';
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