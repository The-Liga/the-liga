let cart = [];
let wishlist = [];

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

function updateCartCount() {
    document.getElementById("cart-count").innerText = cart.length;
}

function updateWishlistCount() {
    document.getElementById("wishlist-count").innerText = wishlist.length;
}


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

// Close modal functionality
document.getElementById("close-cart").onclick = function() {
    document.getElementById("cart-modal").style.display = "none";
};

document.getElementById("close-wishlist").onclick = function() {
    document.getElementById("wishlist-modal").style.display = "none";
};

window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
};

document.getElementById("close-search").onclick = function() {
    document.getElementById("search-modal").style.display = "none";
};

// Open modals when icons are clicked
document.getElementById("cart-icon").onclick = function() {
    document.getElementById("cart-modal").style.display = "block";
};

document.getElementById("wishlist-icon").onclick = function() {
    document.getElementById("wishlist-modal").style.display = "block";
};

document.getElementById("search-icon").onclick = function() {
    document.getElementById("search-modal").style.display = "block";
};

// Close modals when clicking outside of them
window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none";
    }
};

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

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartItems(); 
    updateCartCount(); 
}

function removeFromWishlist(index) {
    wishlist.splice(index, 1); 
    updateWislistItems(); 
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

// To close modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('quick-view-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

// Add to cart button functionality
document.getElementById('add-to-cart-btn').onclick = function() {
    // Get product details from the modal
    const productTitle = document.getElementById('quick-view-title').innerText;
    const productPrice = parseFloat(price);
    const productImage = document.getElementById('quick-view-image').src;

    // Call addToCart function
    addToCart({ 
        getAttribute: (attr) => {
            if (attr === "data-name") return productTitle;
            if (attr === "data-price") return productPrice;
            if (attr === "data-image") return productImage;
        }
    });
    
    // Close the quick view modal
    document.getElementById('quick-view-modal').style.display = 'none';
}; 

function redirectToNextPage(nextPageUrl) {
    window.location.href = nextPageUrl;
}


