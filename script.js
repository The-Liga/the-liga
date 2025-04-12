//header functionality //
document.addEventListener('DOMContentLoaded', function() {
    const promoBanner = document.querySelector('.promo-banner');
    const header = document.querySelector('header');
    const promoSlider = document.querySelector('.promo-slider');
    const slides = document.querySelectorAll('.promo-slide');
    const prevBtn = document.querySelector('.promo-nav.prev');
    const nextBtn = document.querySelector('.promo-nav.next');
    
    let currentSlide = 0;
    let lastScrollTop = 0;
    const slideCount = slides.length;
    
    // Initialize slider
    updateSliderPosition();
    
    function updateSliderPosition() {
        promoSlider.style.transform = `translateX(-${currentSlide * 33.333}%)`;
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slideCount;
        updateSliderPosition();
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slideCount) % slideCount;
        updateSliderPosition();
    }
    
    // Event listeners for manual navigation
    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });
    
    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });
    
    // Auto slide functionality
    let slideInterval = setInterval(nextSlide, 4000);
    
    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 4000);
    }
    
    // Scroll behavior
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        
        // Show banner only when at the very top
        if (currentScroll <= 0) {
            promoBanner.classList.remove('hidden');
            header.classList.remove('nav-up');
            header.style.top = '36px'; // Banner height
        } else {
            promoBanner.classList.add('hidden');
            header.classList.add('nav-up');
            header.style.top = '0'; // Move header to top when banner is hidden
        }
        
        // Additional check for scrolling up behavior for the header
        if (currentScroll < lastScrollTop && currentScroll > 36) {
            // Scrolling up but not at the top
            header.classList.remove('nav-up');
        }
        
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
    
    // Initial state check
    if (window.pageYOffset > 0) {
        promoBanner.classList.add('hidden');
        header.classList.add('nav-up');
        header.style.top = '0';
    }
    
    // Pause auto-slide on hover
    promoSlider.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });
    
    promoSlider.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 4000);
    });
});
// End header functionality //


// Language translations
const translations = {
    en: {
        shopNow: 'Shop',
        newArrivals: 'NEW ARRIVALS',
        bestSellers: 'Best Sellers',
        whyChooseUs: 'Why Choose Us?',
        fastDeliveryTitle: 'Fast & Reliable Delivery',
        fastDeliveryDesc: 'We ensure your orders are delivered on time, every time, with real-time tracking available.',
        qualityProductsTitle: 'Quality Products',
        qualityProductsDesc: 'All our products undergo strict quality control to ensure you receive only the best.',
        customerSupportTitle: 'Excellent Customer Support',
        customerSupportDesc: 'Our dedicated support team is here to assist you with any questions or concerns.',
        easyReturnsTitle: 'Easy Returns',
        easyReturnsDesc: 'If you\'re not satisfied, our hassle-free return policy makes it easy to exchange or return items.',
        sales: 'SALES'
    },
    fr: {
        shopNow: 'Acheter',
        newArrivals: 'NOUVELLES ARRIVÉES',
        bestSellers: 'Meilleures Ventes',
        whyChooseUs: 'Pourquoi nous choisir?',
        fastDeliveryTitle: 'Livraison Rapide et Fiable',
        fastDeliveryDesc: 'Nous garantissons que vos commandes sont livrées à temps, avec un suivi en temps réel.',
        qualityProductsTitle: 'Produits de Qualité',
        qualityProductsDesc: 'Tous nos produits subissent un contrôle qualité strict pour vous garantir le meilleur.',
        customerSupportTitle: 'Support Client Excellent',
        customerSupportDesc: 'Notre équipe de support dédiée est là pour vous aider avec toute question ou préoccupation.',
        easyReturnsTitle: 'Retours Faciles',
        easyReturnsDesc: 'Si vous n\'êtes pas satisfait, notre politique de retour sans tracas vous permet d\'échanger ou de retourner facilement des articles.',
        sales: 'SOLDES'
    },
    es: {
        shopNow: 'Comprar',
        newArrivals: 'NUEVAS LLEGADAS',
        bestSellers: 'Más Vendidos',
        whyChooseUs: '¿Por qué elegirnos?',
        fastDeliveryTitle: 'Entrega Rápida y Confiable',
        fastDeliveryDesc: 'Garantizamos que sus pedidos se entreguen a tiempo, con seguimiento en tiempo real.',
        qualityProductsTitle: 'Productos de Calidad',
        qualityProductsDesc: 'Todos nuestros productos pasan por un estricto control de calidad para garantizarle lo mejor.',
        customerSupportTitle: 'Excelente Servicio al Cliente',
        customerSupportDesc: 'Nuestro equipo de soporte dedicado está aquí para ayudarle con cualquier pregunta o inquietud.',
        easyReturnsTitle: 'Devoluciones Fáciles',
        easyReturnsDesc: 'Si no está satisfecho, nuestra política de devolución sin complicaciones le permite cambiar o devolver artículos fácilmente.',
        sales: 'VENTAS'
    },
    ru: {
        welcome: 'Добро пожаловать в The Liga',
        shopNow: 'Купить',
        newArrivals: 'НОВЫЕ ПОСТУПЛЕНИЯ',
        bestSellers: 'Бестселлеры',
        whyChooseUs: 'Почему выбирают нас?',
        fastDeliveryTitle: 'Быстрая и надежная доставка',
        fastDeliveryDesc: 'Мы гарантируем доставку ваших заказов вовремя с отслеживанием в реальном времени.',
        qualityProductsTitle: 'Качественные Продукты',
        qualityProductsDesc: 'Все наши продукты проходят строгий контроль качества, чтобы обеспечить вам только лучшее.',
        customerSupportTitle: 'Отличная поддержка клиентов',
        customerSupportDesc: 'Наша выделенная команда поддержки готова помочь вам с любыми вопросами или проблемами.',
        easyReturnsTitle: 'Простые возвраты',
        easyReturnsDesc: 'Если вы остались недовольны, наша беспроблемная политика возврата позволяет легко обменивать или возвращать товары.',
        sales: 'РАСПРОДАЖА'
    },
    ar: {
        welcome: 'مرحباً بك في The Liga',
        shopNow: 'تسوق الآن',
        newArrivals: 'وصل حديثًا',
        bestSellers: 'الأكثر مبيعاً',
        whyChooseUs: 'لماذا تختارنا؟',
        fastDeliveryTitle: 'توصيل سريع وموثوق',
        fastDeliveryDesc: 'نضمن توصيل طلباتك في الوقت المحدد مع تتبع فوري.',
        qualityProductsTitle: 'منتجات عالية الجودة',
        qualityProductsDesc: 'جميع منتجاتنا تخضع لرقابة جودة صارمة لضمان أفضل المنتجات.',
        customerSupportTitle: 'دعم عملاء ممتاز',
        customerSupportDesc: 'فريق الدعم المخصص لدينا هنا للمساعدة في أي استفسارات أو مخاوف.',
        easyReturnsTitle: 'مرتجعات سهلة',
        easyReturnsDesc: 'إذا لم تكن راضيًا، فسياسة الإرجاع السلسة لدينا تجعل استبدال أو إرجاع العناصر أمرًا سهلاً.',
        sales: 'التخفيضات'
    }
};

// Toggle Language Popup
function toggleLanguagePopup() {
    const popup = document.getElementById('languagePopup');
    popup.classList.toggle('active');
}

// Change Language Function
function changeLanguage(lang) {
    // Update active language buttons
    document.querySelectorAll('#languagePopup button').forEach(btn => {
        btn.classList.remove('active');
    });
    document.getElementById(`lang-${lang}`).classList.add('active');

    // Translate specific elements
    const elementsToTranslate = [
        { selector: '.inner-text h1', key: 'welcome' },
        { selector: '.shop-btn', key: 'shopNow' },
        { selector: '.products-list:nth-of-type(1)', key: 'newArrivals' },
        { selector: '.products-list:nth-of-type(2)', key: 'bestSellers' },
        { selector: 'h1[style*="text-align: center; font-weight: bold;"]', key: 'whyChooseUs' },
        { selector: '.why-card:nth-child(1) h3', key: 'fastDeliveryTitle' },
        { selector: '.why-card:nth-child(1) p', key: 'fastDeliveryDesc' },
        { selector: '.why-card:nth-child(2) h3', key: 'qualityProductsTitle' },
        { selector: '.why-card:nth-child(2) p', key: 'qualityProductsDesc' },
        { selector: '.why-card:nth-child(3) h3', key: 'customerSupportTitle' },
        { selector: '.why-card:nth-child(3) p', key: 'customerSupportDesc' },
        { selector: '.why-card:nth-child(4) h3', key: 'easyReturnsTitle' },
        { selector: '.why-card:nth-child(4) p', key: 'easyReturnsDesc' },
        { selector: '.products-list:nth-of-type(3)', key: 'sales' }
    ];

    elementsToTranslate.forEach(item => {
        const element = document.querySelector(item.selector);
        if (element) {
            element.textContent = translations[lang][item.key];
        }
    });

    // Close popup after selection
    toggleLanguagePopup();

    // Store language preference
    localStorage.setItem('site-lang', lang);

    // Update page direction for Arabic
    document.body.style.direction = lang === 'ar' ? 'rtl' : 'ltr';
    document.body.style.textAlign = lang === 'ar' ? 'right' : 'left';
}

// Initialize Language on Page Load
function initLanguage() {
    // Check for saved language preference
    const savedLang = localStorage.getItem('site-lang') || 'en';
    changeLanguage(savedLang);
}

// Run on page load
document.addEventListener('DOMContentLoaded', initLanguage);

// Close popup if clicked outside
document.addEventListener('click', function(event) {
    const popup = document.getElementById('languagePopup');
    if (popup && !popup.contains(event.target) && popup.classList.contains('active')) {
        toggleLanguagePopup();
    }
});

//End Language //

// Initialize arrays to store cart and wishlist items
let cart = [];
let wishlist = [];

// Create notification container
function createNotification(message, type) {
    // Remove any existing notifications
    const existingNotifications = document.getElementById('notification-container');
    if (existingNotifications) {
        existingNotifications.remove();
    }

    // Create notification container
    const notificationContainer = document.createElement('div');
    notificationContainer.id = 'notification-container';
    notificationContainer.className = `notification ${type}`;
    notificationContainer.innerText = message;
    
    // Add to body
    document.body.appendChild(notificationContainer);

    // Automatically remove notification after 3 seconds
    setTimeout(() => {
        if (notificationContainer) {
            notificationContainer.remove();
        }
    }, 3000);
}

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
    
    // Show notification
    createNotification(`${product.name} added to cart`, 'success');
}

// Add to Wishlist functionality 
function addToWishlist(button) {
    const product = {
        name: button.getAttribute("data-name"),
        price: parseFloat(button.getAttribute("data-price")),
        image: button.getAttribute("data-image"),
    };

    // Check if product is already in wishlist
    const isDuplicate = wishlist.some(item => 
        item.name === product.name && item.price === product.price
    );

    if (!isDuplicate) {
        // Always add the product to wishlist
        wishlist.push(product);
        button.style.color = "red";
        
        // Update wishlist count and items
        updateWishlistCount();
        updateWishlistItems();
        
        // Show notification
        createNotification(`${product.name} added to wishlist`, 'success');
    }
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

    // Group similar items to show unique products
    const groupedWishlist = wishlist.reduce((acc, item) => {
        const key = `${item.name}-${item.price}`;
        if (!acc[key]) {
            acc[key] = { ...item, count: 1 };
        } else {
            acc[key].count++;
        }
        return acc;
    }, {});

    Object.values(groupedWishlist).forEach((item, index) => {
        const wishlistItem = document.createElement("div");
        wishlistItem.innerHTML = `
            <div class="carts-container">
                <div class="carts-container-child">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="carts-prices">
                        <div>${item.name} ${item.count > 1 ? `(${item.count})` : ''}</div>
                        <div>R${item.price.toFixed(2)}</div>
                    </div>
                </div>
                <div class="button-group">
                    <button class="remove-btn" onclick="removeFromWishlist(${index})">
                        <i class="fa-solid fa-trash"></i>
                    </button> 
                    <button class="add-to-cart-btn" onclick="moveToCart(${index})">Add to Cart</button>
                </div>
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
    const groupedWishlist = wishlist.reduce((acc, item) => {
        const key = `${item.name}-${item.price}`;
        if (!acc[key]) {
            acc[key] = { ...item, indices: [wishlist.indexOf(item)] };
        } else {
            acc[key].indices.push(wishlist.indexOf(item));
        }
        return acc;
    }, {});

    const wishlistGroups = Object.values(groupedWishlist);
    const selectedGroup = wishlistGroups[index];

    // Add item to cart
    cart.push({
        name: selectedGroup.name,
        price: selectedGroup.price,
        image: selectedGroup.image
    });
    
    // Find and reset the heart color for this item (multiple ways to select)
    const heartButtons = document.querySelectorAll(`[data-name="${selectedGroup.name}"][data-price="${selectedGroup.price}"]`);
    heartButtons.forEach(heartButton => {
        heartButton.style.color = "black";
    });
    
    // Remove the corresponding item from wishlist
    wishlist.splice(selectedGroup.indices[0], 1);

    updateWishlistItems();
    updateCartItems();
    updateWishlistCount();
    updateCartCount();
    
    // Show notification
    createNotification(`${selectedGroup.name} moved to cart`, 'success');
}

// Remove item from Cart
function removeFromCart(index) {
    const removedItem = cart[index];
    cart.splice(index, 1);
    updateCartItems();
    updateCartCount();
    
    // Show notification
    createNotification(`${removedItem.name} removed from cart`, 'warning');
}

// Remove item from Wishlist
function removeFromWishlist(index) {
    const groupedWishlist = wishlist.reduce((acc, item) => {
        const key = `${item.name}-${item.price}`;
        if (!acc[key]) {
            acc[key] = { ...item, indices: [wishlist.indexOf(item)] };
        } else {
            acc[key].indices.push(wishlist.indexOf(item));
        }
        return acc;
    }, {});

    const wishlistGroups = Object.values(groupedWishlist);
    const selectedGroup = wishlistGroups[index];

    // Find and reset the heart color for this item (multiple ways to select)
    const heartButtons = document.querySelectorAll(`[data-name="${selectedGroup.name}"][data-price="${selectedGroup.price}"]`);
    heartButtons.forEach(heartButton => {
        heartButton.style.color = "black";
    });
    
    // Remove the corresponding item from wishlist
    wishlist.splice(selectedGroup.indices[0], 1);

    updateWishlistItems();
    updateWishlistCount();
    
    // Show notification
    createNotification(`${selectedGroup.name} removed from wishlist`, 'warning');
}

// Add CSS for notifications
const style = document.createElement('style');
style.textContent = `
    #notification-container {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px;
        color: white;
        border-radius: 5px;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        animation: slideIn 0.3s ease-out;
    }
    
    #notification-container.success {
        background-color: #4CAF50;
    }
    
    #notification-container.warning {
        background-color: #424040;
    }
    
    #notification-container.error {
        background-color: #F44336;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
`;
document.head.appendChild(style);

// End of cart & wishlist functionality//

// Animation and Checkout Transition //

// End Animation and Checkout Transition //

// Quick View functionality
function openQuickView(product) {
    // Get the parent product grid
    const productGrid = product.closest('.product-grid');
    
    // Find elements within the product grid
    const imageElement = productGrid.querySelector('.product-image .img-1');
    const titleElement = productGrid.querySelector('.product-content .title a');
    const priceElement = productGrid.querySelector('.product-content .price');
    
    // Extract the correct information
    const title = titleElement ? titleElement.innerText : 'Product';
    const price = priceElement ? priceElement.innerText.replace('R', '').trim() : '0.00';
    const image = imageElement ? imageElement.src : 'assets/';
    
    // Update quick view modal with correct information
    document.getElementById('quick-view-title').innerText = title;
    document.getElementById('quick-view-price').innerText = `Price: R${price}`;
    document.getElementById('quick-view-image').src = image;
    
    // You can customize the description or add more specific descriptions
    document.getElementById('quick-view-description').innerText = `Detailed description for ${title}`;
    
    // Show the modal
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

//Search Functionality //
// Get all products with only images
function getAllProducts() {
    const products = [];
    const productElements = document.querySelectorAll('.product-grid');

    productElements.forEach(productElement => {
        const imageElement = productElement.querySelector('.img-1');
        if (imageElement) {
            products.push({
                image: imageElement.src,
                element: productElement.cloneNode(true)
            });
        }
    });

    return products;
}

// Filter products by name using the query
function filterProducts(searchQuery, products) {
    return products.filter(product => {
        const searchTerms = searchQuery.toLowerCase().split(' ');
        const productName = product.element.querySelector('.title a').textContent.toLowerCase();
        return searchTerms.every(term => productName.includes(term));
    });
}

// Clear previous search results
function clearSearch() {
    const searchInput = document.getElementById('modal-search-input');
    searchInput.value = ''; // Clear input field

    const modalContent = document.querySelector('#search-modal .modal-content');
    const existingResults = modalContent.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove(); // Remove search results
    }
}

// Display only images in search results
function displaySearchResults(filteredProducts) {
    const modalContent = document.querySelector('#search-modal .modal-content');

    // Remove any existing results
    const existingResults = modalContent.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }

    const resultsContainer = document.createElement('div');
    resultsContainer.className = 'search-results';
    resultsContainer.style.cssText = 'margin-top: 20px; max-height: 400px; overflow-y: auto;';

    if (filteredProducts.length === 0) {
        resultsContainer.innerHTML = '<p style="text-align: center;">No products found</p>';
    } else {
        const imageGrid = document.createElement('div');
        imageGrid.style.cssText = 'display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px;';

        filteredProducts.forEach(product => {
            const imgElement = document.createElement('img');
            imgElement.src = product.image;
            imgElement.alt = 'Product Image';
            imgElement.style.cssText = 'width: 100%; height: auto; object-fit: cover; border-radius: 8px;';
            imageGrid.appendChild(imgElement);
        });

        resultsContainer.appendChild(imageGrid);
    }

    modalContent.appendChild(resultsContainer);
}

// Initialize search when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('modal-search-input');
    const searchButton = document.getElementById('modal-search-btn');
    const clearButton = document.getElementById('clearSearch');
    const allProducts = getAllProducts();

    // Search Button Event
    searchButton.addEventListener('click', () => {
        const searchQuery = searchInput.value.trim();
        if (searchQuery) {
            const filteredProducts = filterProducts(searchQuery, allProducts);
            displaySearchResults(filteredProducts);
        }
    });

    // Enter Key Event
    searchInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            const searchQuery = searchInput.value.trim();
            if (searchQuery) {
                const filteredProducts = filterProducts(searchQuery, allProducts);
                displaySearchResults(filteredProducts);
            }
        }
    });

    // Clear Button Event
    clearButton.addEventListener('click', clearSearch); // Clear functionality
});



function redirectToNextPage(nextPageUrl) {
    window.location.href = nextPageUrl;
}

//scroll btn prev - next button functionality //
document.addEventListener('DOMContentLoaded', () => {
    // Select all scroll containers
    const scrollContainers = document.querySelectorAll('.scroll-container');

    scrollContainers.forEach(container => {
        const prevBtn = container.querySelector('.prev-btn');
        const nextBtn = container.querySelector('.next-btn');
        const rowProducts = container.querySelector('.row-products');
        
        // Calculate scroll amount based on product width plus gap
        // Using the width from your CSS (340px) plus margin (10px * 2) plus gap
        const scrollAmount = 370; // 340 + 20 + 10

        // Function to check scroll position and update button states
        const updateButtonStates = () => {
            // Check if scrolling is at the start
            if (rowProducts.scrollLeft <= 0) {
                prevBtn.style.opacity = '0.5';
                prevBtn.style.cursor = 'not-allowed';
            } else {
                prevBtn.style.opacity = '1';
                prevBtn.style.cursor = 'pointer';
            }

            // Check if scrolling is at the end
            if (Math.ceil(rowProducts.scrollLeft + rowProducts.clientWidth) >= rowProducts.scrollWidth) {
                nextBtn.style.opacity = '0.5';
                nextBtn.style.cursor = 'not-allowed';
            } else {
                nextBtn.style.opacity = '1';
                nextBtn.style.cursor = 'pointer';
            }
        };

        // Previous button click handler
        prevBtn.addEventListener('click', () => {
            if (rowProducts.scrollLeft > 0) {
                rowProducts.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            }
        });

        // Next button click handler
        nextBtn.addEventListener('click', () => {
            if (rowProducts.scrollLeft + rowProducts.clientWidth < rowProducts.scrollWidth) {
                rowProducts.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });

        // Update button states on scroll
        rowProducts.addEventListener('scroll', updateButtonStates);
        
        // Update button states on window resize
        window.addEventListener('resize', updateButtonStates);
        
        // Initial button state check
        updateButtonStates();
    });
});
// End Scroll functionality //

//Hamburger Menu functionality//
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger-menu');
    const mainNav = document.querySelector('.main-nav');
    const body = document.body;

    // Toggle menu function
    function toggleMenu() {
        hamburger.classList.toggle('active');
        mainNav.classList.toggle('active');
        body.classList.toggle('menu-open');
        closeButton.style.display = mainNav.classList.contains('active') ? 'block' : 'none';
    }

    // Close menu function
    function closeMenu() {
        hamburger.classList.remove('active');
        mainNav.classList.remove('active');
        body.classList.remove('menu-open');
        closeButton.style.display = 'none';
    }

    // Hamburger click event
    hamburger.addEventListener('click', toggleMenu);

    // Close button click event
    closeButton.addEventListener('click', closeMenu);

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!mainNav.contains(event.target) && 
            !hamburger.contains(event.target) && 
            mainNav.classList.contains('active')) {
            closeMenu();
        }
    });

    // Close menu when clicking nav links
    const navLinks = document.querySelectorAll('.main-nav ul li a');
    navLinks.forEach(function(link) {
        link.addEventListener('click', closeMenu);
    });

    // Handle escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && mainNav.classList.contains('active')) {
            closeMenu();
        }
    });
});
//End Hamburger Menu functionality//

// Welcome pop_up functionality //
// Show modal when page loads - now shows every time
window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('welcome-modal').style.display = 'block';
});

// Close modal function
function closeWelcomeModal() {
    document.getElementById('welcome-modal').style.display = 'none';
}

// Close when clicking the X
document.querySelector('#welcome-modal .close').addEventListener('click', closeWelcomeModal);

// Close when clicking outside the modal
window.addEventListener('click', (event) => {
    if (event.target == document.getElementById('welcome-modal')) {
        closeWelcomeModal();
    }
});
//End Welcome Pop-Up functionality //

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

//End Quick View functionality//

// size guide //
        // Add an event listener to the "Learn more" button
        document.querySelector('.learn-more').addEventListener('click', () => {
            // Redirect to the size guide page in the same tab
            window.location.href = 'Size_Guide.html';
          });
// End side guide //

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

/* Explore section */
document.querySelectorAll('.explore-btn').forEach((button) => {
    button.addEventListener('click', () => {
        const category = button.textContent.trim().toLowerCase(); // Get button text
        window.location.href = `/${category}-category.html`; // Navigate to the respective page
    });
});
/* End Explore section */

/* Sales popup function */
/* Sales popup function */
document.addEventListener('DOMContentLoaded', function () {
    const salesPopup = document.getElementById('sales-popup');
    const saleIcon = document.getElementById('sale-icon');
    const closeSales = document.querySelector('.close-sales');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const addToWishlistButtons = document.querySelectorAll('.add-to-wishlist');

    // Function to show the sales popup
    function showSalesPopup() {
        salesPopup.style.display = 'block';
        setTimeout(function () {
            salesPopup.style.left = '0';
        }, 10);

        // Animate sales items when the popup is shown
        const salesItems = document.querySelectorAll('.sales-item');
        salesItems.forEach((item, index) => {
            item.style.animation = `fadeIn 0.5s ease-in-out ${index * 0.2}s`;
            item.style.animationFillMode = 'forwards';
        });
    }

    // Function to close the sales popup
    function closeSalesPopup() {
        salesPopup.style.left = '-100%';
        setTimeout(function () {
            salesPopup.style.display = 'none';
        }, 500);
    }

    // Event listener for GIF icon click
    saleIcon.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior
        showSalesPopup();
    });

    // Close the popup when clicking on the close button
    closeSales.addEventListener('click', function () {
        closeSalesPopup();
    });

    // Close the popup when clicking outside of it
    window.addEventListener('click', function (event) {
        if (event.target === salesPopup) {
            closeSalesPopup();
        }
    });

    // Add to Cart functionality
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            const image = this.getAttribute('data-image');
            addToCart(this, name, price, image);
        });
    });

    // Add to Wishlist functionality
    addToWishlistButtons.forEach(button => {
        button.addEventListener('click', function () {
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            const image = this.getAttribute('data-image');
            addToWishlist(this, name, price, image);
        });
    });

    // Add to Cart function
    function addToCart(button, name, price, image) {
        console.log(`Added to cart: ${name} - R${price}`);
        createNotification(`${name} added to cart`, 'success');
    }

    // Add to Wishlist function
    function addToWishlist(button, name, price, image) {
        console.log(`Added to wishlist: ${name} - R${price}`);
        createNotification(`${name} added to wishlist`, 'success');
    }

    // Notification function
    function createNotification(message, type) {
        const existingNotifications = document.getElementById('notification-container');
        if (existingNotifications) {
            existingNotifications.remove();
        }

        const notificationContainer = document.createElement('div');
        notificationContainer.id = 'notification-container';
        notificationContainer.className = `notification ${type}`;
        notificationContainer.innerText = message;

        document.body.appendChild(notificationContainer);

        setTimeout(() => {
            if (notificationContainer) {
                notificationContainer.remove();
            }
        }, 3000);
    }
});

/* End Sales popup */


/* End Sales popup */

/* story */

/* End Story */

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
  /* END Admin Panel */
