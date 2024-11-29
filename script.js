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

// Add to Wishlist functionality with toggle
function addToWishlist(button) {
    const product = {
        name: button.getAttribute("data-name"),
        price: parseFloat(button.getAttribute("data-price")),
        image: button.getAttribute("data-image"),
    };

    // Check if item is already in wishlist
    const existingItemIndex = wishlist.findIndex(item => 
        item.name === product.name && 
        item.price === product.price
    );

    if (existingItemIndex === -1) {
        // Item not in wishlist - add it and make heart red
        wishlist.push(product);
        button.style.color = "red";
    } else {
        // Item already in wishlist - remove it and make heart black
        wishlist.splice(existingItemIndex, 1);
        button.style.color = "black";
    }

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
    const item = wishlist[index];
    
    cart.push({
        name: item.name,
        price: item.price,
        image: item.image
    });
    
    // Find and reset the heart color for this item
    const heartButton = document.querySelector(`a[data-name="${item.name}"][data-price="${item.price}"]`);
    if (heartButton) {
        heartButton.style.color = "black";
    }
    
    wishlist.splice(index, 1);
    updateWishlistItems();
    updateCartItems();
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
    const item = wishlist[index];
    // Find and reset the heart color for this item
    const heartButton = document.querySelector(`a[data-name="${item.name}"][data-price="${item.price}"]`);
    if (heartButton) {
        heartButton.style.color = "black";
    }
    
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
        let backgroundImage = 'url("assets/banner.jpg")';
        
        // Debug: Log the current pathname
        console.log('Current pathname:', currentPage);
        
        // Check current page and set appropriate background
        // Using includes() with more specific checks to avoid partial matches
        if (currentPage.endsWith('men.html')) {
            backgroundImage = 'url("../assets/men_pg.png")';
        } else if (currentPage.endsWith('women.html')) {
            backgroundImage = 'url("../assets/women_pg.png")';
        } else if (currentPage.endsWith('new_arrivals.html')) {
            backgroundImage = 'url("../assets/New_Arr._page.png")';
        } else if (currentPage.endsWith('fashion.html')) {
            backgroundImage = 'url("../assets/Fashion_page.png")';
        } else if (currentPage.endsWith('accessories.html')) {
            backgroundImage = 'url("../assets/Access_page.png")';
        } else if (currentPage.endsWith('shoes.html')) {
            backgroundImage = 'url("../assets/shoes_bg.png")';
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
  

