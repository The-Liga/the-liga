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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

    <?php include('./components/navbar.php'); ?>
    
    
    
    <!-- Search Modal -->
    <div id="search-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-search">&times;</span>
            <h2>Search Products</h2>
            <input type="text" placeholder="Search for products..." id="search-input">
            <button type="button">Search</button>
        </div>
    </div>
    
    <!-- Cart Modal -->
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-cart">&times;</span>
            <h2 style="text-align: center;">Your Cart</h2>
            <hr style="border: 1px solid #000; margin-bottom: 15px;" />
            <div id="cart-items" class="cart-items"></div>
            <div class="checkout-button-container">
                <button onclick="">Checkout<i style="margin-left: 10px;" class="fa-solid fa-cart-shopping"></i></button>
                <div id="total-price" style="font-weight: bold; margin-top: 10px;"><bold>Total: </bold>R0.00</div>
            </div>
            <!-- Checkout Button will be dynamically added here -->
        </div>
    </div>

    
    <!-- Wishlist Modal -->
    <div id="wishlist-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-wishlist">&times;</span>
            <h2 style="text-align: center;">Your Wishlist</h2>
            <hr style="border: 1px solid #000; margin-bottom: 15px;"/>
            <div id="wishlist-items" class="wishlist-items">
                <!-- Wishlist items will be dynamically added here -->
            </div>
            <div style="align-items: center; margin-top: 20px; display: flex; justify-content: center;">
                <button>Add to Cart</button>
            </div>
        </div>
    </div>
    
    <div class="home">
        <div class="inner-container">
            <!-- <h1>Welcome</h1> -->
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
                <button class="scroll-btn prev-btn"><li style="color: white" class="fa fa-angle-left"></li></button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/hoodie.jpg">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="./assets/shirt.png"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/shirt.png"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/shirt.png"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R661.99 <span>R779.11</span></div>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R799.99 <span>R899.99</span></div>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R499.99 <span>R599.99</span></div>
                                <h3 class="title"><a href="#">Summer Dress</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/home1.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R599.99 <span>R899.99</span></div>
                                <h3 class="title"><a href="#">Bucket Hat</a></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Additional product items can be added here... -->
    
                </div>
                <button class="scroll-btn next-btn"><li style="color: white" class="fa fa-angle-right"></li></button>
            </div>
        </div>

        <!-- BEST SELLERS -->
        <div>
            <h1 class="products-list">Best Sellers</h1>
            <hr class="horizontal-line" />
            <div class="scroll-container">
                <button class="scroll-btn prev-btn"><li style="color: white" class="fa fa-angle-left"></li></button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/hat.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R661.99 <span>R779.11</span></div>
                                <h3 class="title"><a href="#">For Men</a></h3>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R799.99 <span>R899.99</span></div>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R499.99 <span>R599.99</span></div>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price">R1299.99 <span>R1499.99</span></div>
                                <h3 class="title"><a href="#">Two Pieces</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <!-- Additional product items can be added here... -->
    
                </div>
                <button class="scroll-btn next-btn"><li style="color: white" class="fa fa-angle-right"></li></button>
            </div>
        </div>

        <!--Why-Us section -->
        <h1 style="text-align: center; font-weight: bold;">Why Choose Us?</h1>
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
                <button class="scroll-btn prev-btn"><li style="color: white" class="fa fa-angle-left"></li></button>
                <div class="row-products">
                    <!-- Product Items -->
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/shirt.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price" style="color: red;">R661.99 <span>R779.11</span></div>
                                <h3 class="title"><a href="#">For Men</a></h3>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price" style="color: red;">R1299.99 <span>R1499.99</span></div>
                                <h3 class="title"><a href="#">Leather Jacket</a></h3>
                            </div>
                        </div>
                    </div>
    
    
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/sneakers.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price" style="color: red;">R499.99 <span>R599.99</span></div>
                                <h3 class="title"><a href="#">Sneakers</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="./pages/products.html" class="image">
                                    <img class="img-1" src="assets/sport bag_cleanup.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>                                
                            </div>
                            <div class="product-content">
                                <div class="price" style="color: red;">R1200.00 <span>R1499.99</span></div>
                                <h3 class="title"><a href="#">Duffle Bag</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <!-- Additional product items can be added here... -->
    
                </div>
                <button class="scroll-btn next-btn"><li style="color: white" class="fa fa-angle-right"></li></button>
            </div>
        </div>

        <!-- Newletter -->
        <div class="body-newsletter">
        <div class="newsletter-card">
            <h1 class="newsletter-card-title">Subscribe</h1>
            <p class="newsletter-card-content">Get fresh web design resources delivered straight to your inbox every week.
            </p>
            <div class="newsletter-card-form">
                <input placeholder="Your Email" type="text">
                <button class="sign-up"> Sign up</button>
            </div>
        </div>
        </div>
        </div>

    

        <!-- Quick View Modal -->
        <div id="quick-view-modal" class="quickview-modal">
            <div class="quickview-modal-content">
                    <div class="view-top">
                    <span class="close" id="close-quick-view">&times;</span>
                    <h2 id="quick-view-title">Product Title</h2>
                    </div>
                <div class="view-left">
                    <img id="quick-view-image" src="" alt="Product Image" />
                    <div class="view-sizes">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                    </div>
                    <div class="view-colors">
                        <span>Blue</span>
                        <span>Red</span>
                        <span>Black</span>
                        <span>White</span>
                        <span>Orange</span>
                    </div>
                </div>
                <div class="view-right">
                    <div id="quick-view-description">Product description goes here.</div>
                    <div class="view-stars">
                        <li class="fa fa-star" style="color: black;"></li>
                        <li class="fa fa-star" style="color: black;"></li>
                        <li class="fa fa-star" style="color: black;"></li>
                        <li class="fa fa-star" style="color: black;"></li>
                        <li class="fa fa-star" style="color: black;"></li>
                    </div>
                    <div id="quick-view-price">Price: R0.00</div>
                    <button id="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </div>

        <!--  -->


    
        <?php include('./components/footer.php'); ?>


        <!-- Link to external JavaScript -->
        <script src="script.js"></script>
</body>
</html>
