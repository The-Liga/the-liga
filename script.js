// Initialize arrays to store cart and wishlist items
let cart = [];
let wishlist = [];

// Add to Cart functionality
function addToCart(button) {
    const product = {
        name: button.getAttribute("data-name"),
        price: parseFloat(button.getAttribute("data-price")),
        image: button.getAttribute("data-image"),
    };
    cart.push(product);
    updateCartCount();
    updateCartItems();
}

// Add to Wishlist functionality
function addToWishlist(button) {
    const product = {
        name: button.getAttribute("data-name"),
        price: parseFloat(button.getAttribute("data-price")),
        image: button.getAttribute("data-image"),
    };
    wishlist.push(product);
    updateWishlistCount();
    updateWishlistItems();
}

// Update the cart counter
function updateCartCount() {
    document.getElementById("cart-count").innerText = cart.length;
}

// Update the wishlist counter
function updateWishlistCount() {
    document.getElementById("wishlist-count").innerText = wishlist.length;
}

// Update Wishlist Items Display
function updateWishlistItems() {
    const wishlistItemsContainer = document.getElementById("wishlist-items");
    wishlistItemsContainer.innerHTML = ''; // Clear existing items

    wishlist.forEach((item, index) => {
        const wishlistItem = document.createElement("div");
        wishlistItem.innerHTML = `
            <div class="carts-container">
                <div class="carts-container-child">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="carts-prices">
                        <div>${item.name}</div>
                        <div>R${item.price.toFixed(2)}</div>
                    </div>
                </div>
                <button class="remove-btn" onclick="removeFromWishlist(${index})">
                    <i class="fa-solid fa-trash"></i>
                </button> 
                <button class="add-to-cart-btn" onclick="moveToCart(${index})">Add to Cart</button>
            </div>
            <hr/>
        `;
        wishlistItemsContainer.appendChild(wishlistItem);
    });
}

// Update Cart Items Display
function updateCartItems() {
    const cartItemsContainer = document.getElementById("cart-items");
    cartItemsContainer.innerHTML = ''; 
    let total = 0;

    cart.forEach((item, index) => {
        const cartItem = document.createElement("div");
        cartItem.innerHTML = `
            <div class="carts-container">
                <div class="carts-container-child">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="carts-prices">
                        <div>${item.name}</div>
                        <div>R${item.price.toFixed(2)}</div>
                    </div>
                </div>
                <button class="remove-btn" onclick="removeFromCart(${index})">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
            <hr/>
        `;
        cartItemsContainer.appendChild(cartItem);
        total += item.price;
    });

    document.getElementById("total-price").innerHTML = `<bold>Total: </bold>R${total.toFixed(2)}`;
}

// Move item from Wishlist to Cart
function moveToCart(index) {
    // Get the item from wishlist
    const item = wishlist[index];
    
    // Add to cart
    cart.push({
        name: item.name,
        price: item.price,
        image: item.image
    });
    
    // Remove from wishlist
    wishlist.splice(index, 1);
    
    // Update both displays
    updateWishlistItems();
    updateCartItems();
    
    // Update counts
    updateWishlistCount();
    updateCartCount();
}

// Remove item from Cart
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartItems();
    updateCartCount();
}

// Remove item from Wishlist
function removeFromWishlist(index) {
    wishlist.splice(index, 1);
    updateWishlistItems();
    updateWishlistCount();
}

// Quick View functionality
function openQuickView(product) {
    const title = product.getAttribute('data-name');
    const price = product.getAttribute('data-price');
    const image = product.getAttribute('data-image');
    
    document.getElementById('quick-view-title').innerText = title;
    document.getElementById('quick-view-price').innerText = `Price: R${parseFloat(price).toFixed(2)}`;
    document.getElementById('quick-view-image').src = image;
    document.getElementById('quick-view-description').innerText = "Description for " + title;
    
    document.getElementById('quick-view-modal').style.display = 'block';
}

// Modal Close Functions
document.getElementById("close-cart").onclick = function() {
    document.getElementById("cart-modal").style.display = "none";
};

document.getElementById("close-wishlist").onclick = function() {
    document.getElementById("wishlist-modal").style.display = "none";
};

document.getElementById("close-search").onclick = function() {
    document.getElementById("search-modal").style.display = "none";
};

document.getElementById('close-quick-view').onclick = function() {
    document.getElementById('quick-view-modal').style.display = 'none';
};

// Modal Open Functions
document.getElementById("cart-icon").onclick = function() {
    document.getElementById("cart-modal").style.display = "block";
};

document.getElementById("wishlist-icon").onclick = function() {
    document.getElementById("wishlist-modal").style.display = "block";
};

document.getElementById("search-icon").onclick = function() {
    document.getElementById("search-modal").style.display = "block";
};

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
};

// Add to cart from Quick View
document.getElementById('add-to-cart-btn').onclick = function() {
    const productTitle = document.getElementById('quick-view-title').innerText;
    const productPrice = parseFloat(document.getElementById('quick-view-price').innerText.replace('Price: R', ''));
    const productImage = document.getElementById('quick-view-image').src;

    addToCart({ 
        getAttribute: (attr) => {
            if (attr === "data-name") return productTitle;
            if (attr === "data-price") return productPrice;
            if (attr === "data-image") return productImage;
        }
    });
    
    document.getElementById('quick-view-modal').style.display = 'none';
};

// Search Functionality
function getAllProducts() {
    const products = [];
    const productElements = document.querySelectorAll('.product-grid');
    
    productElements.forEach(productElement => {
        const titleElement = productElement.querySelector('.title a');
        const priceElement = productElement.querySelector('.price');
        const imageElement = productElement.querySelector('.img-1');
        
        const priceText = priceElement.textContent.replace('R', '').split(' ')[0];
        const price = parseFloat(priceText);

        products.push({
            name: titleElement.textContent,
            price: price,
            image: imageElement.src,
            element: productElement.cloneNode(true)
        });
    });
    
    return products;
}

function filterProducts(searchQuery, products) {
    return products.filter(product => {
        const searchTerms = searchQuery.toLowerCase().split(' ');
        const productName = product.name.toLowerCase();
        
        return searchTerms.every(term => productName.includes(term));
    });
}

function clearSearch() {
    const searchInput = document.getElementById('modal-search-input');
    searchInput.value = '';
    
    const modalContent = document.querySelector('#search-modal .modal-content');
    const existingResults = modalContent.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }
}

function displaySearchResults(filteredProducts) {
    const modalContent = document.querySelector('#search-modal .modal-content');
    
    const existingResults = modalContent.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }
    
    const resultsContainer = document.createElement('div');
    resultsContainer.className = 'search-results';
    resultsContainer.style.cssText = 'margin-top: 20px; max-height: 400px; overflow-y: auto;';
    
    const clearButtonContainer = document.createElement('div');
    clearButtonContainer.style.cssText = 'display: flex; justify-content: flex-end; margin-bottom: 10px;';
    
    const clearButton = document.createElement('button');
    clearButton.textContent = 'Clear Search';
    clearButton.className = 'clear-search-btn';
    clearButton.onclick = clearSearch;
    
    clearButtonContainer.appendChild(clearButton);
    resultsContainer.appendChild(clearButtonContainer);
    
    if (filteredProducts.length === 0) {
        resultsContainer.innerHTML += '<p style="text-align: center;">No products found</p>';
    } else {
        const productsGrid = document.createElement('div');
        productsGrid.style.cssText = 'display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;';
        
        filteredProducts.forEach(product => {
            const productClone = product.element;
            productsGrid.appendChild(productClone);
        });
        
        resultsContainer.appendChild(productsGrid);
    }
    
    modalContent.appendChild(resultsContainer);
}

// Initialize search when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('modal-search-input');
    const searchButton = document.getElementById('modal-search-btn');
    const allProducts = getAllProducts();
    
    searchButton.addEventListener('click', () => {
        const searchQuery = searchInput.value.trim();
        if (searchQuery) {
            const filteredProducts = filterProducts(searchQuery, allProducts);
            displaySearchResults(filteredProducts);
        }
    });
    
    searchInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            const searchQuery = searchInput.value.trim();
            if (searchQuery) {
                const filteredProducts = filterProducts(searchQuery, allProducts);
                displaySearchResults(filteredProducts);
            }
        }
    });
});


function redirectToNextPage(nextPageUrl) {
    window.location.href = nextPageUrl;
}

//Add the quick view functionality//
document.addEventListener('DOMContentLoaded', function() {
    const images = [
        '/assets/blackcap1.png',
        '/assets/Cap_Front_And_Back_View_UV1.png',
        '/assets/beanie-on-table-with-accessories-mockup-005.png',
        '/assets/hat.png'
    ];
    
    let currentImageIndex = 0;
    const mainImage = document.getElementById('quick-view-image');
    const dots = document.querySelectorAll('.nav-dot');

    // Function to update the main image and active dot
    function updateImage(index) {
        currentImageIndex = index;
        mainImage.src = images[index];
        
        // Update active dot
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // Navigation functions
    window.plusDivs = function(n) {
        let newIndex = (currentImageIndex + n + images.length) % images.length;
        updateImage(newIndex);
    }

    window.currentDiv = function(n) {
        updateImage(n - 1);
    }

    // Initialize first image and dot
    updateImage(0);

    // Add click handlers for carousel arrows
    document.querySelector('.carousel-arrow.prev').addEventListener('click', () => plusDivs(-1));
    document.querySelector('.carousel-arrow.next').addEventListener('click', () => plusDivs(1));
});

//Registrations functionality//
document.addEventListener('DOMContentLoaded', function() {
    const signUpButton = document.getElementById('signUpButton');
    const signInButton = document.getElementById('signInButton');
    const signInForm = document.getElementById('signIn');
    const signUpForm = document.getElementById('signup');

    // Ensure default visibility
    signUpForm.style.display = 'none'; // Initially hide sign-up form
    signInForm.style.display = 'block'; // Initially show sign-in form

    // Event listener for switching to Sign Up
    signUpButton.addEventListener('click', function() {
        signInForm.style.display = "none";
        signUpForm.style.display = "block";
    });

    // Event listener for switching to Sign In
    signInButton.addEventListener('click', function() {
        signInForm.style.display = "block";
        signUpForm.style.display = "none";
    });
});

/* Inner-container */
document.addEventListener('DOMContentLoaded', function() {
    // Get the inner container
    const innerContainer = document.querySelector('.inner-container');
    
    // Get the current page URL
    const currentPage = window.location.pathname;
    
    // Function to set background based on page
    function setBackgroundImage() {
        // Default background for home page
        let backgroundImage = 'url("assets/logo1.jpg")';
        
        // Check current page and set appropriate background
        if (currentPage.includes('men.html')) {
            backgroundImage = 'url("../assets/Men_page.png")';
        } else if (currentPage.includes('women.html')) {
            backgroundImage = 'url("../assets/Women_page.png")';
        } else if (currentPage.includes('new_arrivals.html')) {
            backgroundImage = 'url("../assets/New_Arr._page.png")';
        } else if (currentPage.includes('fashion.html')) {
            backgroundImage = 'url("../assets/Fashion_page.png")';
        } else if (currentPage.includes('accessories.html')) {
            backgroundImage = 'url("../assets/Access_page.png")';
        } else if (currentPage.includes('shoes.html')) {
            backgroundImage = 'url("../assets/Shoes_page.png")';
        }
        
        // Set the background image
        if (innerContainer) {
            innerContainer.style.backgroundImage = backgroundImage;
            
            // Log for debugging
            console.log('Current page:', currentPage);
            console.log('Setting background:', backgroundImage);
        }
    }
    
    // Call the function when page loads
    setBackgroundImage();
});
/*End Inner-container */

/* ADMIN */
document.addEventListener('DOMContentLoaded', function () {
    const notificationIcon = document.querySelector('.notification-icon');
    const notificationContainer = document.querySelector('.notification-container');
    const notificationDropdown = document.querySelector('.notification-dropdown');
  
    // Toggle dropdown and unread status on icon click
    notificationIcon.addEventListener('click', function (event) {
      event.stopPropagation(); // Prevent event from bubbling to document
      notificationContainer.classList.toggle('active');
  
      // Mark notifications as read and hide the red dot
      if (notificationIcon.classList.contains('unread')) {
        notificationIcon.classList.remove('unread');
      }
    });
  
    // Close the dropdown if clicking outside of it
    document.addEventListener('click', function (event) {
      if (!notificationContainer.contains(event.target)) {
        notificationContainer.classList.remove('active');
      }
    });
  });
  


