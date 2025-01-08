<?php
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Liga | Home</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./assets/icon.png" type="image/x-icon">
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
            <span class="close" id="close-cart" style="color: black;">&times;</span>
            <h1 style="text-align: center; font-weight: bold; font-size: 25px;">Your Cart</h1>
            <hr style="border: 1px solid #000; margin-bottom: 15px;" />
            <div id="cart-items" class="cart-items"></div>
            <div class="checkout-button-container">
                <button onclick="" href="./pages/checkout.html">Checkout<i style="margin-left: 10px;" class="fa-solid fa-cart-shopping"></i></button>
                <div id="total-price" style="font-weight: bold; margin-top: 10px;">
                    <bold>Total: </bold>R0.00
                </div>
            </div>
            <!-- Checkout Button will be dynamically added here -->
        </div>
    </div>


    <!-- Wishlist Modal -->
    <div id="wishlist-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-wishlist" style="color: black;">&times;</span>
            <h1 style="text-align: center; font-weight: bold; font-size: 25px;">Your Wishlist</h1>
            <hr style="border: 1px solid #000; margin-bottom: 15px;" />
            
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
        <div class="inner-container" style="background-image: url('assets/Banner_hero.png');">
            <p><strong>"FOR THE BOLD"</strong></p>
            <a class="shop-btn" href="./pages/products.php">
                <span class="shop-text">SHOP</span>
                <img src="./assets/shopping.png" alt="Shop icon" class="shop-icon">
            </a>
        </div>

        <!-- NEW ARRIVALS -->
         <br>
        <div>
            <h1 class="products-list" style="font-weight: bold;">New Arrivals</h1>
            <hr>
            <br>
            <div class="scroll-container">
                <button class="scroll-btn prev-btn">
                    <i class="fas fa-angle-left"></i>
                </button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/White_Cap1.png" alt="White Cap">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="Caps" data-price="661.99" data-image="assets/White_Cap1.png"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="Caps" data-price="661.99" data-image="assets/White_Cap1.png"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="Caps" data-price="661.99" data-image="assets/White_Cap1.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R661.99</div>
                                <h3 class="title"><a href="#">Caps</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/Full_Logo_Polo_Tshirt.png" alt="Polo T-shirt">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="T-shirt" data-price="799.99" data-image="assets/Full_Logo_Polo_Tshirt.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R799.99</div>
                                <h3 class="title"><a href="#">T-shirt</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/Bucket_hat1.png" alt="Bucket Hat">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="Bucket Hat" data-price="799.99" data-image="assets/bucket_ha1.png"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price"  style="font-weight: bold; font-size: 18px;">R799.99</div>
                                <h3 class="title"><a href="#">Bucket Hat</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/Whitehoodie.jpg" alt="Whitehoodie">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="Whitehoodie" data-price="799.99" data-image="assets/Whitehoodie"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="Whitehoodie" data-price="799.99" data-image="assets/Whitehoodie"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="Whitehoodie" data-price="799.99" data-image="assets/Whitehoodie"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R750.99</div>
                                <h3 class="title"><a href="#">Bucket Hat</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/black&white_cap.jpg" alt="black&white_capt">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="black&white_cap" data-price="399.99" data-image="assets/black&white_cap.jpg"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="black&white_cap" data-price="399.99" data-image="assets/black&white_cap.jpg"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="black&white_cap" data-price="399.99" data-image="assets/black&white_cap.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R399.99</div>
                                <h3 class="title"><a href="#">Two color Cap</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn next-btn">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
        </div>
        <br>

        <!-- THE LIGA X NETBALL SOUTH AFRICA -->
        <div>
            <h1 class="products-list" style="font-weight: bold;"> THE LIGA X NETBALL SOUTH AFRICA </h1>
            <hr>
            <br>
            <div class="scroll-container">
                <button class="scroll-btn prev-btn">
                    <i class="fas fa-angle-left"></i>
                </button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball1.jpg" alt="BE VERSATILE '25 HOODIE">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 HOODIE" data-price="1500.00" data-image="assets/netball1.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R1.500</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 HOODIE</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball2.jpg" alt="BE VERSATILE '25 POLO SHIRT">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 POLO SHIRT" data-price="1200.00" data-image="assets/netball2.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R1.200</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 POLO SHIRT</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball3.jpg" alt="BE VERSATILE '25 BASEBALL CAP">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R850</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 BASEBALL CAP</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/netball3.jpg" alt="BE VERSATILE '25 BASEBALL CAP">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fas fa-shopping-cart" onclick="addToCart(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fas fa-heart" onclick="addToWishlist(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                    <li><a href="#" class="fas fa-eye" onclick="openQuickView(this)" data-name="BE VERSATILE '25 BASEBALL CAP" data-price="850.00" data-image="assets/netball3.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price" style="font-weight: bold; font-size: 18px;">R850</div>
                                <h3 class="title"><a href="#">BE VERSATILE '25 BASEBALL CAP</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn next-btn">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
        </div>
        <br>

        <!--Why-Us section -->
        <h1 style="text-align: left; font-weight: 500; margin-left: 40px; font-size: 32px; font-weight: bold;">Our Promises</h1>
        <hr>
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

        <h1 class="explore-list" style="font-weight: bold;">EXPLORE</h1>
        <hr>
        <br>
        <div class="row-products">
            <!-- Explore Item: Women -->
            <div class="col-md-3 col-sm-6">
                <div class="explore-item">
                    <img src="assets/women1.png" alt="Women">
                    <a href="pages/women.php" class="explore-btn">WOMEN <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- Explore Item: Men -->
            <div class="col-md-3 col-sm-6">
                <div class="explore-item">
                    <img src="assets/men1.png" alt="Men">
                    <a href="pages/men.php" class="explore-btn">MEN <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- Explore Item: Kids -->
            <div class="col-md-3 col-sm-6">
                <div class="explore-item">
                    <img src="assets/kids1.png" alt="Kids">
                    <a href="pages/kids.php" class="explore-btn">KIDS <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Sales Pop-up -->
        <div id="sales-popup" class="sales-popup scroll-container">

            <div class="sales-content">

                <span class="close-sales">&times;</span>
                <h2 style="font-size: 30px; margin-bottom: 30px; font-weight: bold; text-align: center;">Special Sales!</h2>
                <div class="sales-grid r0w-products">
                    <div class="sales-item">
                        <img src="assets/leather_jacket1.png" alt="Leather Jacket">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Leather Jacket</h3>
                        <p>Now: R1299.99 <br><span>Was: R1499.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/sneakers1.png" alt="Sneakers">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Sneakers</h3>
                        <p>Now: R1799.99 <br><span>Was: R2199.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Duffle Bag</h3>
                        <p>Now: R1200.00 <br><span>Was: R1499.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Duffle Bag</h3>
                        <p>Now: R1200.00 <br><span>Was: R1499.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Duffle Bag</h3>
                        <p>Now: R1200.00 <br><span>Was: R1499.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Duffle Bag</h3>
                        <p>Now: R1200.00 <br><span>Was: R1499.99</span></p>
                    </div>
                    <div class="sales-item">
                        <img src="assets/Daffle_Bag1.png" alt="Duffle Bag">
                        <h3 style="font-size: 24px; margin-bottom: 30px;">Duffle Bag</h3>
                        <p>Now: R1200.00 <br><span>Was: R1499.99</span></p>
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
                                <button class="learn-more">Size Guide</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <?php include('./components/footer.php'); ?>


        <!-- Link to external JavaScript -->
        <script src="./script.js"></script>
</body>

</html>