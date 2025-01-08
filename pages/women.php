<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> The Liga | Women </title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../assets/icon.png" type="image/x-icon">
</head>

<body>
    <?php include('../components/navbar.php'); ?>
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
                <button onclick="" href="./pages/checkout.html">Checkout<i style="margin-left: 10px;"
                        class="fa-solid fa-cart-shopping"></i></button>
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
            <span class="close" id="close-wishlist" style="color: red;">&times;</span>
            <h1 style="text-align: center;">Your Wishlist</h1>
            <hr style="border: 1px solid #000; margin-bottom: 15px;" />
            <div id="wishlist-items" class="wishlist-items">
                <!-- Items will be dynamically added here -->
                <!-- <button class="remove-btn" onclick="removeFromCart(index)"><i class="fa-solid fa-trash"></i></button> -->
            </div>
        </div>
    </div>

    <div class="home">
        <div class="inner-container" style="background-image: url('../assets/Women_page.png'); margin-top: 25px;">
            <!-- <h1>Welcome</h1> -->
            <a class="shop-btn" href="products.html">Shop</a>
        </div>
    </div>


    <!-- New Arrivals -->
    <div>
        <h1 class="products-list">New Arrivals</h1>
        <div class="scroll-container">
            <button class="scroll-btn prev-btn">
                <li style="color: rgb(0, 0, 0)" class="fa fa-angle-left"></li>
            </button>
            <div class="row-products">
                <!-- Product Items -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/White_G_Shirt.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="White Golf Shirt" data-price="779.11<"
                                        data-image="../assets/White_G_Shirt.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)"
                                        data-name="White Golf Shirt" data-price="779.11<"
                                        data-image="../assets/White_G_Shirt.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)"
                                        data-name="White Golf Shirt" data-price="779.11<"
                                        data-image="../assets/White_G_Shirt.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R661.99 <span>R779.11</span></div>
                            <h3 class="title"><a href="#">White Golf Shirt</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/Black_G_Shirt.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Black Golf Shirt" data-price="899.99"
                                        data-image="../assets/Black_G_Shirt.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)"
                                        data-name="Black Golf Shirt" data-price="899.99"
                                        data-image="../assets/Black_G_Shirt.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)"
                                        data-name="Black Golf Shirt" data-price="899.99"
                                        data-image="../assets/Black_G_Shirt.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R799.99 <span>R899.99</span></div>
                            <h3 class="title"><a href="#">Black Golf Shirt</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/bucket_ha1.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Bucket Hat" data-price="599.99"
                                        data-image="../assets/bucket_ha1.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Bucket Hat"
                                        data-price="599.99" data-image="../assets/bucket_ha1.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Bucket Hat"
                                        data-price="599.99" data-image="../assets/bucket_ha1.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R499.99 <span>R599.99</span></div>
                            <h3 class="title"><a href="#">Bucket Hat</a></h3>
                        </div>
                    </div>
                </div>


                <!-- Additional product items can be added here... -->

            </div>
            <button class="scroll-btn next-btn">
                <li style="color: rgb(0, 0, 0)" class="fa fa-angle-right"></li>
            </button>
        </div>
    </div>

    <!-- BEST SELLERS -->
    <div>
        <h1 class="products-list">Best Sellers</h1>
        <div class="scroll-container">
            <button class="scroll-btn prev-btn">
                <li style="color: rgb(0, 0, 0)" class="fa fa-angle-left"></li>
            </button>
            <div class="row-products">
                <!-- Product Items -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/sweater1.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Sweaters" data-price="779.11"
                                        data-image="../assets/sweater1.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Sweaters"
                                        data-price="779.11" data-image="../assets/sweater1.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Sweaters"
                                        data-price="779.11" data-image="../assets/sweater1.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R661.99 <span>R779.11</span></div>
                            <h3 class="title"><a href="#">Sweaters</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/Black_Cap1.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Caps"
                                        data-price="499.99" data-image="../assets/Black_Cap1.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Caps"
                                        data-price="499.99" data-image="../assets/Black_Cap1.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Caps"
                                        data-price="499.99" data-image="../assets/Black_Cap1.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R250.00 <span>R499.99</span></div>
                            <h3 class="title"><a href="#">Caps</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/Crossbag.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Crossbag" data-price="599.99"
                                        data-image="../assets/Crossbag.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Crossbag"
                                        data-price="599.99" data-image="../assets/Crossbag.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Crossbag"
                                        data-price="599.99" data-image="../assets/Crossbag.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R499.99 <span>R599.99</span></div>
                            <h3 class="title"><a href="#">Crossbag</a></h3>
                        </div>
                    </div>
                </div>

                <!-- Additional product items can be added here... -->

            </div>
            <button class="scroll-btn next-btn">
                <li style="color: rgb(0, 0, 0)" class="fa fa-angle-right"></li>
            </button>
        </div>
    </div>

    <!-- BEST SELLERS -->
    <div>
        <h1 class="products-list">Best Sellers</h1>
        <div class="scroll-container">
            <button class="scroll-btn prev-btn">
                <li style="color: rgb(2, 2, 2)" class="fa fa-angle-left"></li>
            </button>
            <div class="row-products">
                <!-- Product Items -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/Hoodie1.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)" data-name="Hoodie"
                                        data-price="779.11" data-image="../assets/Hoodie1.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Hoodie"
                                        data-price="779.11" data-image="../assets/Hoodie1.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Hoodie"
                                        data-price="779.11" data-image="../assets/Hoodie1.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R661.99 <span>R779.11</span></div>
                            <h3 class="title"><a href="#">Hoodie</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="./pages/products.html" class="image">
                                <img class="img-1" src="../assets/leather_jacket1.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Leather Jacket" data-price="1299.99"
                                        data-image="../assets/jacket.jpg"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)"
                                        data-name="Leather Jacket" data-price="1299.99"
                                        data-image="../assets/jacket.jpg"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)"
                                        data-name="Leather Jacket" data-price="1299.99"
                                        data-image="../assets/jacket.jpg"></a></li>
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
                                <img class="img-1" src="../assets/Schoolblack.png">
                            </a>
                            <ul class="product-links">
                                <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart(this)"
                                        data-name="Schoolbags" data-price="599.99"
                                        data-image="../assets/Schoolblack.png"></a></li>
                                <li><a href="#" class="fa fa-heart" onclick="addToWishlist(this)" data-name="Schoolbags"
                                        data-price="599.99" data-image="../assets/Schoolblack.png"></a></li>
                                <li><a href="#" class="fa fa-eye" onclick="openQuickView(this)" data-name="Schoolbags"
                                        data-price="599.99" data-image="../assets/Schoolblack.png"></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">R499.99 <span>R599.99</span></div>
                            <h3 class="title"><a href="#">Schoolbags</a></h3>
                        </div>
                    </div>
                </div>

                <!-- Additional product items can be added here... -->

            </div>
            <button class="scroll-btn next-btn">
                <li style="color: rgb(0, 0, 0)" class="fa fa-angle-right"></li>
            </button>
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

    <!-- Footer -->
    <?php include('../components/footer.php'); ?>

    <!-- Link to external JavaScript -->
    <script src="../script.js"></script>
</body>

</html>