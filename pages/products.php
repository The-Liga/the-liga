<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>"../index.js"</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

   <!--Header section-->
   <?php include('../components/navbar.php'); ?>

   <br><br><br><br><br>

    <div class="main-products-container">
        <div class="inner-categories">
            <h1>Filters</h1>
           
            <hr/>
            <div class="filters">
                <h6>By Name:</h6>
                <div class="group">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
                      <g>
                        <path
                          d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                        ></path>
                      </g>
                    </svg>
                  
                    <input
                      id="query"
                      class="input"
                      type="search"
                      placeholder="Search..."
                      name="searchbar"
                    />
                  </div>
                  
                  <div class="dropdown">
                    <button class="btn toggler-btn" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </button>
                    <span id="dropdownIcon" class="icon">+</span>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li class="dropdown-submenu">
                           <div class="category-container">
                            <span class="dropdown-item" data-bs-toggle="dropdown-item-menu" aria-expanded="false" id="dropdownItemCategory1">
                                Men
                            </span>
                            <span id="dropdownItemIcon1" class="item-icon">+</span>
                           </div>
                
                            <div class="dropdown-item-menu" aria-labelledby="dropdownItemCategory1">
                                <ul class="dropdown-menu" aria-labelledby="dropdownItemCategory1">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="men-formal-shoes" value="Men-Formal-Shoes">
                                            <label class="form-check-label" for="men-formal-shoes">Formal Shoes</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="men-tshirts" value="Men-Tshirts">
                                            <label class="form-check-label" for="men-tshirts">T-Shirts</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                
                        <li class="dropdown-submenu">
                            <div class="category-container">
                                <span class="dropdown-item" data-bs-toggle="dropdown-item-menu" aria-expanded="false" id="dropdownItemCategory2">
                                    Woman
                                </span>
                                <span id="dropdownItemIcon2" class="item-icon">+</span>
                               </div>
                
                            <div class="dropdown-item-menu" aria-labelledby="dropdownItemCategory2">
                                <ul class="dropdown-menu" aria-labelledby="dropdownItemCategory2">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="women-dresses" value="Women-Dresses">
                                            <label class="form-check-label" for="women-dresses">Dresses</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="women-shoes" value="Women-Shoes">
                                            <label class="form-check-label" for="women-shoes">Shoes</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn toggler-btn" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sports
                    </button>
                    <span id="dropdownIcon" class="icon">+</span>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li class="dropdown-submenu">
                           <div class="category-container">
                            <span class="dropdown-item" data-bs-toggle="dropdown-item-menu" aria-expanded="false" id="dropdownItemCategory1">
                                Netball
                            </span>
                            <span id="dropdownItemIcon1" class="item-icon">+</span>
                           </div>
                
                            <div class="dropdown-item-menu" aria-labelledby="dropdownItemCategory1">
                                <ul class="dropdown-menu" aria-labelledby="dropdownItemCategory1">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="men-formal-shoes" value="Men-Formal-Shoes">
                                            <label class="form-check-label" for="men-formal-shoes">Shoes</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="men-tshirts" value="Men-Tshirts">
                                            <label class="form-check-label" for="men-tshirts">Shocks</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                
                        <li class="dropdown-submenu">
                            <div class="category-container">
                                <span class="dropdown-item" data-bs-toggle="dropdown-item-menu" aria-expanded="false" id="dropdownItemCategory2">
                                    Soccer
                                </span>
                                <span id="dropdownItemIcon2" class="item-icon">+</span>
                               </div>
                
                            <div class="dropdown-item-menu" aria-labelledby="dropdownItemCategory2">
                                <ul class="dropdown-menu" aria-labelledby="dropdownItemCategory2">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="women-dresses" value="Women-Dresses">
                                            <label class="form-check-label" for="women-dresses">Kits</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="category" id="women-shoes" value="Women-Shoes">
                                            <label class="form-check-label" for="women-shoes">Balls</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--                 
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="sizeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Size
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sizeDropdown">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="size-s" value="S">
                                <label class="form-check-label" for="size-s">S</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="size-m" value="M">
                                <label class="form-check-label" for="size-m">M</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="size-l" value="L">
                                <label class="form-check-label" for="size-l">L</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="size-xl" value="XL">
                                <label class="form-check-label" for="size-xl">XL</label>
                            </div>
                        </li>
                    </ul>
                </div> -->

                <div class="filter-group">
                    <label for="priceRange">Price: <span id="priceValue">R0 - R200</span></label>
                    <div class="slider-container">
                        <input type="range" min="1" max="10000" value="50" class="slider" id="priceRange" step="1" oninput="updatePriceValue(this.value)">
                    </div>
                </div>

            </div>
        </div>
        <div class="inner-products-container">
            <section class="section-products">
                
                   
                        <div class="products-sort-box">
                      
                            <button class="sort-button">
                            <span>Apply Filters</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 74 74"
                                height="34"
                                width="34"
                            >
                                <circle stroke-width="3" stroke="black" r="35.5" cy="37" cx="37"></circle>
                                <path
                                fill="black"
                                d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
                                ></path>
                            </svg>
                            </button>

                           
                            <div class="select">
                            <div
                                class="selected"
                                data-default="All"
                                data-one="option-1"
                                data-two="option-2"
                                data-three="option-3"
                            >
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                height="1em"
                                viewBox="0 0 512 512"
                                class="arrow"
                                >
                                <path
                                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                                ></path>
                                </svg>
                            </div>
                            <div class="options">
                                <div title="all">
                                <input id="all" name="option" type="radio" checked="" />
                                <label class="option" for="all" data-txt="Sort-By"></label>
                                </div>
                                <div title="option-1">
                                <input id="option-1" name="option" type="radio" />
                                <label class="option" for="option-1" data-txt="Latest Arrival"></label>
                                </div>
                                <div title="option-2">
                                <input id="option-2" name="option" type="radio" />
                                <label class="option" for="option-2" data-txt="Sale"></label>
                                </div>
                                <div title="option-3">
                                <input id="option-3" name="option" type="radio" />
                                <label class="option" for="option-3" data-txt="Lowest Price"></label>
                                </div>
                                <div title="option-3">
                                    <input id="option-3" name="option" type="radio" />
                                    <label class="option" for="option-3" data-txt="Highest Price"></label>
                                </div>
                            </div>
                            </div>



                        </div>

                        <div class="row">
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-1" class="single-product">
                                                <div class="part-1">
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-old-price">$79.99</h4>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-2" class="single-product">
                                                <div class="part-1">
                                                        <span class="discount">15% off</span>
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-3" class="single-product">
                                                <div class="part-1">
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-old-price">$79.99</h4>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-4" class="single-product">
                                                <div class="part-1">
                                                        <span class="new">new</span>
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-1" class="single-product">
                                                <div class="part-1">
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-old-price">$79.99</h4>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                                <!-- Single Product -->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div id="product-2" class="single-product">
                                                <div class="part-1">
                                                        <span class="discount">15% off</span>
                                                        <ul>
                                                            <li><a href="#" class="fa fa-shopping-cart" onclick="addToCart()"></a></li>
                                                            <li><a href="#" class="fa fa-heart" onclick="addToWishlist()"></a></li>
                                                            <li><a href="./productDetails.html"><i class="fa fa-plus"></i></a></li>
                                                                
                                                        </ul>
                                                </div>
                                                <div class="part-2">
                                                        <h3 class="product-title">Here Product Title</h3>
                                                        <h4 class="product-price">$49.99</h4>
                                                </div>
                                        </div>
                                </div>
                              
                       
                </div>
            </section>
        </div>
    </div>

    <!-- Footer section -->
    <?php include('../components/footer.php'); ?>

    <script>
        
        function updatePriceValue(value) {
            document.getElementById('priceValue').innerText = `$0 - $${value}`;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('categoryDropdown');
            const dropdownIcon = document.getElementById('dropdownIcon');

        
            dropdownButton.addEventListener('click', function () {
                // Toggle between '+' and '-' on click
                if (dropdownButton.getAttribute('aria-expanded') === 'true') {
                    dropdownIcon.textContent = '-'; 
                } else {
                    dropdownIcon.textContent = '+'; 
                }
            });

        });

        document.addEventListener('DOMContentLoaded', function () {
         
            const dropdownItem = document.getElementById('dropdownItemCategory');
            const dropdownItemIcon = document.getElementById('dropdownItemIcon');

            dropdownItem.addEventListener('click', function () {
                // Toggle between '+' and '-' on click
                if (dropdownItem.getAttribute('aria-expanded') === 'true') {
                    dropdownItemIcon.textContent = '-'; 

                } else {
                    dropdownItemIcon.textContent = '+'; 
                }
            });
        });
        
        

        // Enable dropdown-submenu functionality
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

            dropdownSubmenus.forEach(function (submenu) {
                submenu.addEventListener('click', function (e) {
                    e.stopPropagation();
                    this.querySelector('.dropdown-menu').classList.toggle('show');
              
                });
            });
        });
    </script>

    <script>
        // Toggle main menu icon
        document.getElementById("categoryDropdown").addEventListener("click", function() {
            const dropdownIcon = document.getElementById("dropdownIcon");
            dropdownIcon.textContent = dropdownIcon.textContent === "+" ? "−" : "+";
        });
    
        // Toggle submenu icon for Men
        document.getElementById("dropdownItemCategory1").addEventListener("click", function() {
            const submenuIcon = document.getElementById("dropdownItemIcon1");
            submenuIcon.textContent = submenuIcon.textContent === "+" ? "−" : "+";
        });
    
        // Toggle submenu icon for Women
        document.getElementById("dropdownItemCategory2").addEventListener("click", function() {
            const submenuIcon = document.getElementById("dropdownItemIcon2");
            submenuIcon.textContent = submenuIcon.textContent === "+" ? "−" : "+";
        });
    </script>
    
    <script>
        let cartCount = 0; // Initialize cart count
        let wishlistCount = 0; // Initialize wishlist count
    
        // Function to add to cart
        function addToCart() {
            cartCount++; // Increment cart count by 1
            updateCartDisplay();
        }
    
        // Function to remove from cart (if applicable)
        function removeFromCart() {
            if (cartCount > 0) {
                cartCount--; // Decrement cart count by 1
                updateCartDisplay();
            }
        }
    
        // Update the cart display
        function updateCartDisplay() {
            const cartElement = document.querySelector('.nav-link[href="#"] .fa-shopping-cart');
            cartElement.textContent = `Cart (${cartCount})`;
        }
    
        // Function to add to wishlist
        function addToWishlist() {
            wishlistCount++; // Increment wishlist count by 1
            updateWishlistDisplay();
        }
    
        // Update the wishlist display
        function updateWishlistDisplay() {
            const wishlistElement = document.querySelector('.nav-link[href="#"] .fa-heart');
            wishlistElement.textContent = `Wishlist (${wishlistCount})`;
        }
    
        // Event listeners for product buttons
        document.addEventListener('DOMContentLoaded', () => {
            const addToCartButtons = document.querySelectorAll('.product-links li a.fa-shopping-cart');
            const addToWishlistButtons = document.querySelectorAll('.product-links li a.fa-heart');
    
            addToCartButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default action
                    addToCart(); // Increment the cart count
                });
            });
    
            addToWishlistButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default action
                    addToWishlist(); // Increment the wishlist count
                });
            });
        });
    </script>
</body>
</html>