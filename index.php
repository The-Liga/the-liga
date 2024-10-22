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
            <span class="close" id="close-search">&times;</span>
            <h2>Search Products</h2>
            <input type="text" placeholder="Search for products..." id="search-input">
            <button type="button">Search</button>
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
                <button onclick="">Checkout<i style="margin-left: 10px;" class="fa-solid fa-cart-shopping"></i></button>
                <div id="total-price" style="font-weight: bold; margin-top: 10px;"><bold>Total: </bold>R0.00</div>
            </div>
            <!-- Checkout Button will be dynamically added here -->
        </div>
    </div>

    
    <!-- Wishlist Modal -->
    <div id="wishlist-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-wishlist"  style="color: red;">&times;</span>
            <h1 style="text-align: center;">Your Wishlist</h1>
            <hr style="border: 1px solid #000; margin-bottom: 15px;"/>
            <div id="wishlist-items" class="wishlist-items">
                <!-- Wishlist items will be dynamically added here -->
                <button class="remove-btn" onclick="removeFromCart(index)"><i class="fa-solid fa-trash"></i></button>
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
            <a class="shop-btn" href="./pages/register.php">Shop</a>
        </div>
    
        <!-- NEW ARRIVALS -->
        <div>
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
                                <div class="price">R661.99 <span>R779.11</span></div>
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
                                <div class="price">R1299.99 <span>R1499.99</span></div>
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
                                <div class="price">R499.99 <span>R599.99</span></div>
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
                                <div class="price">R1200.00 <span>R1499.99</span></div>
                                <h3 class="title"><a href="#">Duffle Bag</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <!-- Additional product items can be added here... -->
    
                </div>
                <button class="scroll-btn next-btn"><li style="color: white" class="fa fa-angle-right"></li></button>
            </div>
        </div>
    </div>

    <!-- Quick View Modal -->
    <div id="quick-view-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-quick-view">&times;</span>
            <h2 id="quick-view-title">Product Title</h2>
            <img id="quick-view-image" src="" alt="Product Image" />
            <div id="quick-view-description">Product description goes here.</div>
            <div id="quick-view-price">Price: R0.00</div>
            <button id="add-to-cart-btn">Add to Cart</button>
        </div>
    </div>
    
    <?php include('./components/footer.php'); ?>


    <!-- Link to external JavaScript -->
    <script src="script.js"></script>
</body>
</html>
