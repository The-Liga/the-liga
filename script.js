let cart = [];
let wishlist = [];

// Function to add an item to the cart
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

// Function to add an item to the wishlist
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

// Function to move all items from the wishlist to the cart
function moveWishlistToCart() {
    wishlist.forEach(item => {
        cart.push(item);
    });
    wishlist = []; // Clear wishlist after moving items to cart
    updateCartCount();
    updateCartItems();
    updateWishlistCount();
    updateWishlistItems();
    
    // Optionally, close the wishlist modal
    document.getElementById("wishlist-modal").style.display = "none";
}

// Function to update the cart item count display
function updateCartCount() {
    document.getElementById("cart-count").innerText = cart.length;
}

// Function to update the wishlist item count display
function updateWishlistCount() {
    document.getElementById("wishlist-count").innerText = wishlist.length;
}

// Function to display wishlist items in the modal
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
                <button onclick="removeFromWishlist(${index})"><i class="fa-solid fa-trash"></i></button> 
            </div>
            <hr/>
        `;
        wishlistItemsContainer.appendChild(wishlistItem);
    });
}

// Function to display cart items in the modal and calculate total price
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
                <button class="remove-btn" onclick="removeFromCart(${index})"><i class="fa-solid fa-trash"></i></button>
            </div>
            <hr/>
        `;
        cartItemsContainer.appendChild(cartItem);
        total += item.price;
    });

    document.getElementById("total-price").innerText = `R${total.toFixed(2)}`;
}

// Function to remove an item from the cart
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartItems(); 
    updateCartCount(); 
}

// Function to remove an item from the wishlist
function removeFromWishlist(index) {
    wishlist.splice(index, 1); 
    updateWishlistItems(); 
    updateWishlistCount(); 
}



function openQuickView(product) {
    const title = product.getAttribute('data-name');
    const price = product.getAttribute('data-price');
    const image = product.getAttribute('data-image');
    
    // Set the product details in the modal
    document.getElementById('quick-view-title').innerText = title;
    document.getElementById('quick-view-price').innerText = `Price: R${parseFloat(price).toFixed(2)}`;
    document.getElementById('quick-view-image').src = image;
    document.getElementById('quick-view-description').innerText = "Description for " + title; // Add a suitable description here
    
    
    // Show the modal
    document.getElementById('quick-view-modal').style.display = 'block';
}

// Close modal functionality
document.getElementById('close-quick-view').onclick = function() {
    document.getElementById('quick-view-modal').style.display = 'none';
};

// Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
};


function redirectToNextPage(nextPageUrl) {
    window.location.href = nextPageUrl;
}

//Hamburger Menu functionality//
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger-menu');
    const mainNav = document.querySelector('.main-nav');

    hamburger.addEventListener('click', function() {
        // Toggle active class on hamburger and navigation
        hamburger.classList.toggle('active');
        mainNav.classList.toggle('active');
    });

    // Close menu when a nav item is clicked
    const navLinks = document.querySelectorAll('.main-nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            hamburger.classList.remove('active');
            mainNav.classList.remove('active');
        });
    });
});

//Registrations functionality// 
document.addEventListener('DOMContentLoaded', function() {
            const signUpButton = document.getElementById('signUpButton');
            const signInButton = document.getElementById('signInButton');
            const flipContainer = document.querySelector('.flip-container');

            // Set initial heights
            function setContainerHeights() {
                const signIn = document.getElementById('signIn');
                const signUp = document.getElementById('signup');
                const flipper = document.querySelector('.flipper');
                const maxHeight = Math.max(signIn.offsetHeight, signUp.offsetHeight);
                flipper.style.height = maxHeight + 'px';
                flipContainer.style.height = maxHeight + 'px';
            }

            // Set heights on load and window resize
            window.addEventListener('load', setContainerHeights);
            window.addEventListener('resize', setContainerHeights);

            signUpButton.addEventListener('click', function() {
                flipContainer.classList.add('flipped');
            });

            signInButton.addEventListener('click', function() {
                flipContainer.classList.remove('flipped');
            });
        });

/*End Registrations */

/* Inner-container */
document.addEventListener('DOMContentLoaded', function() {
    // Get the inner container
    const innerContainer = document.querySelector('.inner-container');
    
    // Get the current page URL and convert to lowercase for consistent comparison
    const currentPage = window.location.pathname.toLowerCase();
    
    // Function to set background based on page
    function setBackgroundImage() {
        // Default background for home page
        let backgroundImage = 'url("assets/logo1.jpg")';
        
        // Debug: Log the current pathname
        console.log('Current pathname:', currentPage);
        
        // Check current page and set appropriate background
        // Using includes() with more specific checks to avoid partial matches
        if (currentPage.endsWith('men.html')) {
            backgroundImage = 'url("../assets/men_pg.png")';
        } else if (currentPage.endsWith('Women.html')) {
            backgroundImage = 'url("../assets/women_pg.png")';
        } else if (currentPage.endsWith('new_arrivals.html')) {
            backgroundImage = 'url("../assets/New_Arr._page.png")';
        } else if (currentPage.endsWith('fashion.html')) {
            backgroundImage = 'url("../assets/Fashion_page.png")';
        } else if (currentPage.endsWith('accessories.html')) {
            backgroundImage = 'url("../assets/Access_page.png")';
        } else if (currentPage.endsWith('shoes.html')) {
            backgroundImage = 'url("../assets/shoes.png")';
        }
        
        // Set the background image if inner container exists
        if (innerContainer) {
            innerContainer.style.backgroundImage = backgroundImage;
            
            // Debug: Log the background being set
            console.log('Setting background:', backgroundImage);
            
            // Verify the background was set correctly
            console.log('Applied background:', innerContainer.style.backgroundImage);
            
            // Add error handling for image loading
            const img = new Image();
            img.onerror = function() {
                console.error('Failed to load image:', backgroundImage);
            };
            img.src = backgroundImage.replace('url("', '').replace('")', '');
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

  
  


