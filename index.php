<?php
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Liga</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/white TL logo.png" type="image/x-icon">
</head>

<body>

    <?php include('./components/navbar.php'); ?>

<!-- Search Modal -->
<div id="search-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-search">&times;</span>
        <h2>Search Products</h2>
        <input type="text" placeholder="Search for products..." id="modal-search-input">
        
        <!-- Search Button on the left and Clear Button on the right -->
        <button type="button" id="modal-search-btn">Search</button>
        <button type="button" id="clearSearch">Clear</button>
    </div>
</div>

    <!-- Cart Modal -->
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-cart" style="color: red;">&times;</span>
            <h1 style="text-align: center;">Your Cart</h1>
            <hr style="border: 1px solid #000; margin-bottom: 15px;" />
            <div id="cart-items" class="cart-items"></div>
            <div class="checkout-button-container">
                <button onclick="" href="./pages/checkout.html">Checkout<i style="margin-left: 10px;" class="fa-solid fa-cart-shopping"></i></button>
                <div id="total-price" style="font-weight: bold; margin-top: 10px;"><bold>Total: </bold>R0.00</div>
            </div>
            <!-- Checkout Button will be dynamically added here -->
        </div>
    </div>

    
      <!-- Wishlist Modal -->  
      <div id="wishlist-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-wishlist" style="color: red;">&times;</span>
        <h1 style="text-align: center;">Your Wishlist</h1>
        <hr style="border: 1px solid #000; margin-bottom: 15px;"/>
        <div id="wishlist-items" class="wishlist-items">
            <!-- Items will be dynamically added here -->
            <button class="remove-btn" onclick="removeFromCart(index)"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
</div>

<!-- Welcome Modal HTML -->
<div id="welcome-modal" class="modal">
    <div class="modal-content" style="max-width: 600px; text-align: center; padding: 40px; background: white; position: relative;">
        <span class="close" style="position: absolute; right: 20px; top: 10px; font-size: 28px; cursor: pointer;">&times;</span>
        
        <h1 style="font-size: 32px; margin-bottom: 30px; font-weight: bold;">WELCOME TO THE LIGA</h1>
        
        <h2 style="font-size: 24px; margin-bottom: 30px;">We now ship to more countries!</h2>
        
        <ul style="list-style: none; margin-bottom: 30px;">
            <li style="margin-bottom: 10px;">✓ Browse & pay in the currency of your choice</li>
            <li style="margin-bottom: 10px;">✓ No additional charges on delivery</li>
        </ul>

        <p style="margin-bottom: 20px;">We've set your delivery country to <strong>SOUTH AFRICA</strong></p>
        
        <button onclick="closeWelcomeModal()" style="background: black; color: white; padding: 15px 30px; border: none; cursor: pointer; font-size: 16px; margin-bottom: 20px;">
            CONTINUE TO THE LIGA
        </button>
        
        <div style="font-size: 14px;">
            Change your shipping country: 
            <select style="padding: 5px; margin-left: 10px;">
                <option value="ZA">🇿🇦 South Africa</option>
                <option value="NA">🇳🇦 Namibia</option>
                <option value="BW">🇧🇼 Botswana</option>
                <option value="ZW">🇿🇼 Zimbabwe</option>
                <option value="RU">🇷🇺 Russia</option>
                <option value="AE">🇦🇪 Dubai, UAE</option>
            </select>
        </div>
    </div>
</div>

 <!-- Language Switcher Popup -->
 <div class="language-popup-container" id="languagePopup">
        <div class="language-popup-toggle" onclick="toggleLanguagePopup()">
            Language
        </div>
        
        <div class="language-popup-content">
            <button onclick="changeLanguage('en')" id="lang-en">
                🇬🇧 English
            </button>
            <button onclick="changeLanguage('fr')" id="lang-fr">
                🇫🇷 Français
            </button>
            <button onclick="changeLanguage('es')" id="lang-es">
                🇪🇸 Español
            </button>
            <button onclick="changeLanguage('ru')" id="lang-ru">
                🇷🇺 Русский
            </button>
            <button onclick="changeLanguage('ar')" id="lang-ar">
                🇦🇪 العربية (دبي)
            </button>
        </div>
    </div>

    <div class="home">
        <div class="inner-container">
            <!-- <h1>Welcome</h1> -->
             <h3>BE VERSATILE '25 </h3>
             <p><strong> "FOR THE BOLD" </strong></p>
             <a class="shop-btn" href="./pages/products.php">Shop ></a>
        </div>
      
        <!-- NEW ARRIVALS -->
        <div>
            <h1 class="products-list">New Arrivals</h1>
            <div class="scroll-container">
                <button class="scroll-btn prev-btn">
                    <li style="color: Black" class="fa fa-angle-left"></li>
                </button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/White_Cap1.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Caps" data-price="661.99" data-image="assets//White_Cap1.png"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Caps" data-price="661.99" data-image="assets//White_Cap1.png"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Caps" data-price="661.99" data-image="assets//White_Cap1.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R661.99</div>
                                <h3 class="title"><a href="#">Caps</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/Full_Logo_Polo_Tshirt.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R799.99</div>
                                <h3 class="title"><a href="#">T-shirt</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/bucket_ha1.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R799.99</div>
                                <h3 class="title"><a href="#">Bucket Hat</a></h3>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Additional product items can be added here... -->

                </div>
                <button class="scroll-btn next-btn">
                    <li style="color: black" class="fa fa-angle-right"></li>
                </button>
            </div>
        </div>

        <!-- THE LIGA X NETBALL SOUTH AFRICA -->
        <div>
            <h1 class="products-list"> THE LIGA X NETBALL SOUTH AFRICA </h1>
            <div class="scroll-container">
                <button class="scroll-btn prev-btn">
                    <li style="color: black" class="fa fa-angle-left"></li>
                </button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball1.jpg">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R1.500</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 HOODIE</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball2.jpg">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R1.200</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 POLO SHIRT</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball3.jpg">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R850</div>   
                                <h3 class="title"><a href="#">BE VERSATILE '25 BASEBALL CAP</a></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Additional product items can be added here... -->

                </div>
                <button class="scroll-btn next-btn">
                    <li style="color: black" class="fa fa-angle-right"></li>
                </button>
            </div>
        </div>

        <!--Why-Us section -->
        <h1 style="text-align: left; font-weight: bold; margin-left: 35px;">Our Promises</h1>
        <div class="why-choose-us">

            <div class="why-card">
                <li class="fa fa-truck" style="font-size: 50px; margin-bottom: 15px;"></li>
                <h3>Fast & Reliable Delivery</h3>
                <p>We ensure your orders are delivered on time, every time, with real-time tracking available.</p>
            </div>
            <div class="why-card">
                <i class="fa-solid fa-shirt" style="font-size: 50px; margin-bottom: 15px;"></i>
                <h3>Quality Products</h3>
                <p>All our products undergo strict quality control to ensure you receive only the best.</p>
            </div>
            <div class="why-card">
                <i class="fa-solid fa-phone" style="font-size: 50px; margin-bottom: 15px;"></i>
                <h3>Excellent Customer Support</h3>
                <p>Our dedicated support team is here to assist you with any questions or concerns.</p>
            </div>
            <div class="why-card">
                <i class="fa-solid fa-rotate" style="font-size: 50px; margin-bottom: 15px;"></i>
                <h3>Easy Returns</h3>
                <p>If you're not satisfied, our hassle-free return policy makes it easy to exchange or return items.</p>
            </div>
        </div>

        <h1 class="explore-list">EXPLORE</h1>
<div class="row-products">
    <!-- Explore Item: Women -->
    <div class="col-md-3 col-sm-6">
        <div class="explore-item">
            <img src="assets/women1.png" alt="Women">
            <a href="pages/women.html" class="explore-btn">WOMEN ></a>
        </div>
    </div>
    <!-- Explore Item: Men -->
    <div class="col-md-3 col-sm-6">
        <div class="explore-item">
            <img src="assets/men1.png" alt="Men">
            <a href="pages/men.html" class="explore-btn">MEN ></a>
        </div>
    </div>
    <!-- Explore Item: Kids -->
    <div class="col-md-3 col-sm-6">
        <div class="explore-item">
            <img src="assets/kids1.png" alt="Kids">
            <a href="pages/shoes.html" class="explore-btn">KIDS ></a>
        </div>
    </div>
</div>

<!-- Sales Pop-up -->
<div id="sales-popup" class="sales-popup">
    <div class="sales-content">
        <span class="close-sales">&times;</span>
        <h2>Special Sales!</h2>
        <div class="sales-grid">
            <div class="sales-item">
                <img src="assets/leather_jacket1.png" alt="Leather Jacket">
                <h3>Leather Jacket</h3>
                <p>Now: R1299.99 <span>Was: R1499.99</span></p>
            </div>
            <div class="sales-item">
                <img src="assets/sneakers1.png" alt="Sneakers">
                <h3>Sneakers</h3>
                <p>Now: R1799.99 <span>Was: R2199.99</span></p>
            </div>
            <div class="sales-item">
                <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                <h3>Duffle Bag</h3>
                <p>Now: R1200.00 <span>Was: R1499.99</span></p>
            </div>
        </div>
    </div>
</div>


          <!-- Quick-view -->
          <div id="quick-view-modal" class="quickview-modal">
    <div class="quickview-modal-content">
        <span class="close" id="close-quick-view">&times;</span>
        
        <div class="quickview-body">
            <!-- Left side with green background and image carousel -->
            <div class="view-left">
                <div class="carousel-container">
                    <button class="carousel-arrow prev">&lt;</button>
                    <div class="main-image-container">
                        <img id="quick-view-image" src="assets/" alt="Product Image" />
                    </div>
                    <button class="carousel-arrow next">&gt;</button>
                </div>
                
            </div>

            <!-- Right side with product info -->
            <div class="view-right">
                <div class="product-info">
                    <h1 id="quick-view-title">Product Title</h1>
                    <p id="quick-view-description" class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Officia, omnis illo iste ratione.
                    </p>
                    <div id="quick-view-price" class="price"></div>
                    <div class="button-group">
                        <button id="add-to-cart-btn" class="add_to_cart">Add to Cart</button>
                        <button class="learn-more">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <!--  -->
        <?php include('./components/footer.php'); ?>


        <!-- Link to external JavaScript -->
        <script src="script.js"></script>
</body>

</html>