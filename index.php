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
        <input type="text" placeholder="Search for products..." id="modal-search-input">
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="./assets/shirt.png"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/shirt.png"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/shirt.png"></a></li>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
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
                                    <img class="img-1" src="assets/home1.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R599.99</div>
                                <h3 class="title"><a href="#">Bucket Hat</a></h3>
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

        <!-- BEST SELLERS -->
        <div>
            <h1 class="products-list">Best Sellers</h1>
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
                                    <img class="img-1" src="assets/hat.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
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
                                    <img class="img-1" src="assets/dress1.png">
                                </a>
                                <ul class="product-links">
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
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
                                    <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                    <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Leather Jacket" data-price="1299.99" data-image="assets/jacket.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="price">R1299.99</div>
                                <h3 class="title"><a href="#">Two Pieces</a></h3>
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
                <button class="scroll-btn next-btn">
                    <li style="color: white" class="fa fa-angle-right"></li>
                </button>
            </div>
        </div>

        <!-- Quick View Modal -->
        <div id="quick-view-modal" class="quickview-modal">
            <div class="quickview-modal-content">

                <div class="view-top">
                    <span class="close" id="close-quick-view">&times;</span>
                    <h2 id="quick-view-title" style="color: black; margin-top: 15px;">Product Title</h2>
                    <hr class="horizontal-line" />
                </div>

                <div class="quickview-body">

                    <div class="view-left">

                        <img id="quick-view-image" src="" alt="Product Image" />
                        <div class="view-sizes">
                            <span class="size">1</span>
                            <span class="size">2</span>
                            <span class="size">3</span>
                            <span class="size">4</span>
                            <span class="size">5</span>
                            <span class="size">6</span>
                            <span class="size">7</span>
                            <span class="size">8</span>
                            <span class="size">9</span>
                        </div>

                        <div class="view-colors">
                            <div class="bg-white w-100" style="width: 25px; height: 25px; border-radius: .5rem;">
                                <div class="d-flex p-2 gap-1">
                                    <div>
                                        <span class="bg-primary d-inline-block" style="width: 25px; height: 25px; border-radius: 50%; background-color: red; "></span>
                                    </div>
                                    <div class="circle">
                                        <span class="bg-purple d-inline-block" style="width: 25px; height: 25px; border-radius: 50%; background-color: yellow;"></span>
                                    </div>
                                    <div class="circle">
                                        <span class="bg-pink d-inline-block" style="width: 25px; height: 25px; border-radius: 50%; background-color: orange;"></span>
                                    </div>
                                    <div class="circle">
                                        <span class="bg-pink d-inline-block" style="width: 25px; height: 25px; border-radius: 50%; background-color: black;"></span>
                                    </div>
                                    <div class="circle">
                                        <span class="bg-pink d-inline-block" style="width: 25px; height: 25px; border-radius: 50%; background-color: gray;"></span>
                                    </div>
                                </div>
                                <div class="card__content">
                                </div>
                            </div>
                        </div>

                        <div class="delivery-info">
                            <h2>Delivery Information</h2>
                            
                            <h3>Fast and Reliable Shipping</h3>
                            <p>We understand that when you order a product, you want it to arrive quickly and safely. That's why we partner with trusted carriers to ensure your order is delivered in a timely manner.</p>
                            
                            <h3>Delivery Options</h3>
                            <ul>
                                <li><strong>Standard Shipping:</strong> Typically takes 5-7 business days. Perfect for those who plan ahead and want to save on shipping costs.</li>
                                <li><strong>Express Shipping:</strong> Get your order in 2-3 business days! Ideal for last-minute purchases or when you need your item urgently.</li>
                                <li><strong>Same-Day Delivery:</strong> Available in select areas for orders placed before noon. Check at checkout to see if you qualify!</li>
                            </ul>
                            
                            <h3>Order Tracking</h3>
                            <p>Once your order is shipped, you will receive a tracking number via email. You can use this number to monitor your package's journey right to your doorstep.</p>
                            
                            <h3>International Shipping</h3>
                            <p>We offer international shipping to many countries. Delivery times may vary based on your location, customs processing, and local carriers. Additional fees may apply.</p>
                            
                            <h3>Delivery Insurance</h3>
                            <p>All orders are covered by delivery insurance to protect against loss or damage during transit. If your package does not arrive or is damaged, please contact our customer service team for assistance.</p>
                            
                            <h3>Delivery Restrictions</h3>
                            <p>Please note that some products may have shipping restrictions based on size, weight, or location. If there are any issues with your order, we will notify you promptly.</p>
                            
                            <h3>Customer Support</h3>
                            <p>If you have any questions or concerns about your delivery, our customer service team is here to help! Feel free to reach out via email or phone for assistance.</p>
                            
                            <h3>Enjoy Your Purchase!</h3>
                            <p>We aim to provide a seamless shopping experience from the moment you order to when you receive your product. Thank you for choosing us!</p>
                            </div>
                    </div>

                    <div class="view-right">
                        <div class="view-right-body">
                            <div id="quick-view-description">Product description goes here.</div>
                            <div id="quick-view-design">Product design goes nhere.</div>
                            <div id="quick-view-details">Product details goes here.</div>
                            <div class="view-stars">
                                <li class="fa fa-star" style="color: black;"></li>
                                <li class="fa fa-star" style="color: black;"></li>
                                <li class="fa fa-star" style="color: black;"></li>
                                <li class="fa fa-star" style="color: black;"></li>
                                <li class="fa fa-star" style="color: black;"></li>
                            </div>
                        </div>
                        <div id="quick-view-price">Price: R0.00</div>
                        <button id="add-to-cart-btn">Add to Cart</button>
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