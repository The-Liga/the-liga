<?php
session_start();
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
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/white TL logo.png" type="image/x-icon">
</head>

<body>

    <?php include('./components/navbar.php'); ?>

    <!-- Search Modal -->
<div id="search-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-search" style="color: red;">&times;</span>
        <h2>Search Products</h2>
        <input type="text" placeholder="What are you looking for?" id="modal-search-input">
        <button type="button" id="modal-search-btn">Search</button>
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

    <div class="home">
        <div class="inner-container">
            <!-- <h1>Welcome</h1> -->
             <h1> THE LIGA </h1>
        </div>
        <div class="inner-text">
            <h1>DON'T WASTE YOUR MONEY, SHOP FOR QUALITY OVER QUANTITY.</h1>
            <a class="shop-btn" href="./pages/products.php">Shop</a>
        </div>

        <!-- NEW ARRIVALS -->
<div style="margin: 50px;">
    <h1 class="products-list">NEW ARRIVALS</h1>
    <hr class="horizontal-line" />
    <div class="scroll-container">
        <button class="scroll-btn prev-btn">
            <li style="color: white" class="fa fa-angle-left"></li>
        </button>
        <div class="row-products">
            <!-- Product Items -->
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/hoodie.jpg">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Men's Hoodie" 
                                data-price="661.99" 
                                data-image="assets/hoodie.jpg"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99"
                                data-image="assets/hoodie.jpg"
                                style="color: black;"></a></li>                 
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Hoodie" 
                                data-price="661.99" 
                                data-image="assets/hoodie.jpg"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R661.99</div>
                        <h3 class="title"><a href="#">For Men</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/women.jpg">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Women's Fashion" 
                                data-price="799.99" 
                                data-image="assets/women.jpg"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Women's Fashion" 
                                data-price="799.99" 
                                data-image="assets/women.jpg"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Women's Fashion" 
                                data-price="799.99" 
                                data-image="assets/women.jpg"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R799.99</div>
                        <h3 class="title"><a href="#">For Women</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/bag.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Fashion Bag" 
                                data-price="499.99" 
                                data-image="assets/bag.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Fashion Bag" 
                                data-price="499.99" 
                                data-image="assets/bag.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Fashion Bag" 
                                data-price="499.99" 
                                data-image="assets/bag.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R499.99</div>
                        <h3 class="title"><a href="#">Summer Dress</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/bucket_hat.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Bucket Hat" 
                                data-price="599.99" 
                                data-image="assets/bucket_hat.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Bucket Hat" 
                                data-price="599.99" 
                                data-image="assets/bucket_hat.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Bucket Hat" 
                                data-price="599.99" 
                                data-image="assets/bucket_hat.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R350.00</div>
                        <h3 class="title"><a href="#">Bucket Hat</a></h3>
                    </div>
                </div>
            </div>
        </div>
        <button class="scroll-btn next-btn">
            <li style="color: white" class="fa fa-angle-right"></li>
        </button>
    </div>
</div>

       <!-- BEST SELLERS -->
<div>
    <h1 class="products-list">Best Sellers</h1>
    <hr class="horizontal-line" />
    <div class="scroll-container">
        <button class="scroll-btn prev-btn">
            <li style="color: white" class="fa fa-angle-left"></li>
        </button>
        <div class="row-products">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/White_Cap1.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Men's Hat" 
                                data-price="661.99" 
                                data-image="assets/hat.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Hat" 
                                data-price="661.99" 
                                data-image="assets/hat.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Hat" 
                                data-price="661.99" 
                                data-image="assets/hat.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R350.00</div>
                        <h3 class="title"><a href="#">Caps</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/dress1.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Summer Dress" 
                                data-price="799.99" 
                                data-image="assets/dress1.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Summer Dress" 
                                data-price="799.99" 
                                data-image="assets/dress1.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Summer Dress" 
                                data-price="799.99" 
                                data-image="assets/dress1.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R799.99</div>
                        <h3 class="title"><a href="#">Summer Dress</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/stomach_out.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Crop Top" 
                                data-price="499.99" 
                                data-image="assets/stomach_out.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Crop Top" 
                                data-price="499.99" 
                                data-image="assets/stomach_out.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Crop Top" 
                                data-price="499.99" 
                                data-image="assets/stomach_out.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R499.99</div>
                        <h3 class="title"><a href="#">Crop Top</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/two_piece.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Two Piece Set" 
                                data-price="1299.99" 
                                data-image="assets/two_piece.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Two Piece Set" 
                                data-price="1299.99" 
                                data-image="assets/two_piece.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Two Piece Set" 
                                data-price="1299.99" 
                                data-image="assets/two_piece.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price">R1299.99</div>
                        <h3 class="title"><a href="#">Two Pieces</a></h3>
                    </div>
                </div>
            </div>
        </div>
        <button class="scroll-btn next-btn">
            <li style="color: white" class="fa fa-angle-right"></li>
        </button>
    </div>
</div>

        <!--Why-Us section -->
        <h1 style="text-align: center; font-weight: bold;">Why Choose Us?</h1>
        <hr class="horizontal-line" />
        <div class="why-choose-us">

            <div class="why-card">
                <li class="fa fa-car" style="font-size: 50px; margin-bottom: 15px;"></li>
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

<!-- SALES -->
<div>
    <h1 class="products-list">SALES</h1>
    <hr class="horizontal-line" />
    <div class="scroll-container">
        <button class="scroll-btn prev-btn">
            <li style="color: white" class="fa fa-angle-left"></li>
        </button>
        <div class="row-products">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/shirt.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price" style="color: red;">R250.00 <span>R300.00</span></div>
                        <h3 class="title"><a href="#">Shirt</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/leather_jacket1.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                            data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price" style="color: red;">R1299.99 <span>R1500.00</span></div>
                        <h3 class="title"><a href="#">Leather Jacket</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/Sneakers1.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                            data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price" style="color: red;">R1499.99 <span>R1800.00</span></div>
                        <h3 class="title"><a href="#">Sneakers</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="./pages/products.html" class="image">
                            <img class="img-1" src="assets/Daffle_Bag1.png">
                        </a>
                        <ul class="product-links">
                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                            data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                            <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" 
                                data-name="Men's Shirt" 
                                data-price="661.99" 
                                data-image="assets/shirt.png"></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <div class="price" style="color: red;">R649.95 <span>R1099.95</span></div>
                        <h3 class="title"><a href="#">Daffle Bag</a></h3>
                    </div>
                </div>
            </div>

                    <!-- Additional product items can be added here... -->

                </div>
                <button class="scroll-btn next-btn">
                    <li style="color: white" class="fa fa-angle-right"></li>
                </button>
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
                        <img id="quick-view-image" src="./assets/" alt="Product Image" />
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
                    <div id="quick-view-price" class="price">R1299.99</div>
                    <div class="button-group">
                        <button id="add-to-cart-btn" class="add-to-cart">Add to Cart</button>
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