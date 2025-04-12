<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Store</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- link external  -->
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../assets/icon.png" type="image/x-icon">
    <style>
        /* kids */
        /* Ensure body covers the whole screen width */
        body {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background-color: black;
            color: white;
            padding: 4rem 1rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        /* Slider Sections */
        .slider-section {
            padding: 4rem 1rem;
            position: relative;
        }

        .slider-container {
            max-width: 1200px;
            margin: 0 auto;
            height: 85vh;
        }

        .slider-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            padding-left: 20px;
        }

        .slider {
            display: flex;
            transition: transform 0.3s ease-in-out;
            gap: 24px;
        }

        .slide {
            flex: 0 0 auto;
            width: calc(33.333% - 16px);
            max-width: 400px;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 400px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 4px;
        }

        .slider-nav {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            pointer-events: none;
            padding: 0 20px;
        }

        .slider-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #e5e5e5;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .slider-button:hover {
            transform: scale(1.1);
        }

        /* Best Reads specific styles */
        .best-reads .slide {
            width: calc(50% - 12px);
        }

        .best-reads .slide img {
            aspect-ratio: 16 / 9;
        }

        .read-content {
            padding: 1rem 0;
        }

        .read-content h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .read-content p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Sizes Section */
        .sizes {
            padding: 4rem 1rem;
            background: #f5f5f5;
        }

        .sizes-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .sizes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .size-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: white;
        }

        .size-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .size-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
        }

        .shop-btn {
            background: white;
            color: black;
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 2rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .shop-btn:hover {
            transform: scale(1.05);
        }

        /* Min Section */
        .min {
            background: white;
            color: black;
            padding: 2rem 1rem;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }

        .min-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .min-col {
            flex: 1;
            min-width: 200px;
            max-width: 250px;
        }

        .min-col h3 {
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: bold;
        }

        .min-col ul {
            list-style: none;
            padding: 0;
        }

        .min-col ul li {
            margin-bottom: 0.5rem;
        }

        .min-col ul li a {
            color: #757575;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .min-col ul li a:hover {
            color: #000;
        }


        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .slide {
                width: calc(50% - 12px);
            }
        }

        @media (max-width: 768px) {
            .sizes-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .slide {
                width: calc(100% - 8px);
            }

            .min-grid {
                flex-direction: column;
                align-items: center;
            }

            .min-col {
                text-align: center;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include('../components/navbar.php'); ?>

    <section class="hero">
        <h1>VOMERO 5</h1>
        <p>Rooted in Running. Remastered for Style.</p>
        <button class="shop-btn" href="products.php">Shop</button>
    </section>

    <!-- Latest & Greatest Section -->
    <section class="slider-section">
        <div class="slider-container">
            <h2 class="slider-title">Latest & Greatest</h2>
            <div class="slider" id="latestSliderKids">
                <div class="slide">
                    <img src="../assets/sandals_men.png" alt="Summer shoes">
                    <h3>Summer shoes</h3>
                </div>
                <div class="slide">
                    <img src="../assets/kidshoodie.png" alt="Winter Wear">
                    <h3>Winter Wear</h3>
                </div>
                <div class="slide">
                    <img src="../assets/teen_girls.png" alt="Teen Girls">
                    <h3>Teen Girls</h3>
                </div>
                <div class="slide">
                    <img src="../assets/footwear.png" alt="Fresh Footwear">
                    <h3>Fresh Footwear</h3>
                </div>
                <div class="slide">
                    <img src="../assets/bras & Leggins.png" alt="Bras & Leggings">
                    <h3>Bras & Leggings</h3>
                </div>
                <div class="slide">
                    <img src="../assets/sweater1.png" alt="Fresh Footwear">
                    <h3>Black & White Selects</h3>
                </div>
            </div>
            <div class="slider-nav">
                <button class="slider-button prev" onclick="slideLatestKids(-1)">←</button>
                <button class="slider-button next" onclick="slideLatestKids(1)">→</button>
            </div>
        </div>
    </section>

    <section class="sizes">
        <div class="sizes-container">
            <h2 class="slider-title">Sizes for All</h2>
            <div class="sizes-grid">
                <div class="size-card">
                    <img src="../assets/babies & toddlers.png" alt="Babies & Toddlers">
                    <div class="size-content">
                        <h3>Babies & Toddlers (0-4Y)</h3>
                        <button class="shop-btn">Shop</button>
                    </div>
                </div>
                <div class="size-card">
                    <img src="../assets/Younger Kids (4-7Y).png" alt="Younger Kids">
                    <div class="size-content">
                        <h3>Younger Kids (4-7Y)</h3>
                        <button class="shop-btn">Shop</button>
                    </div>
                </div>
                <div class="size-card">
                    <img src="../assets/Older Kids (7-15Y).png" alt="Older Kids">
                    <div class="size-content">
                        <h3>Older Kids (7-15Y)</h3>
                        <button class="shop-btn">Shop</button>
                    </div>
                </div>
                <div class="size-card">
                    <img src="../assets/Extended Sizes.png" alt="Extended Sizes">
                    <div class="size-content">
                        <h3>Extended Sizes</h3>
                        <button class="shop-btn">Shop</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Icons For Them Section -->
    <section class="slider-section">
        <div class="slider-container">
            <h2 class="slider-title">Icons For Them</h2>
            <div class="slider" id="iconsSliderKids">
                <div class="slide">
                    <img src="../assets/sneakers1.png" alt="Revolution">
                    <h3>Revolution</h3>
                </div>
                <div class="slide">
                    <img src="../assets/sandals_girls.png" alt="Jordan">
                    <h3>Jordan</h3>
                </div>
                <div class="slide">
                    <img src="../assets/kidsbeanie.jpg" alt="Dunk">
                    <h3>Dunk</h3>
                </div>
                <div class="slide">
                    <img src="/api/placeholder/400/400" alt="Air Force 1">
                    <h3>Air Force 1</h3>
                </div>
            </div>
            <div class="slider-nav">
                <button class="slider-button prev" onclick="slideIconsKids(-1)">←</button>
                <button class="slider-button next" onclick="slideIconsKids(1)">→</button>
            </div>
        </div>
    </section>

    <!-- Best Reads Section -->
    <section class="best-reads">
        <div class="slider-container">
            <h2 class="slider-title">Best Reads</h2>
            <div class="slider" id="readsSliderKids">
                <div class="slide read-card">
                    <img src="../assets/teen.png" alt="Nike and LEGO partnership">
                    <div class="read-content">
                        <h3>Sport Is Our Play</h3>
                        <p>Introducing our newest partner in play, the LEGO Group.</p>
                    </div>
                </div>
                <div class="slide read-card">
                    <img src="/api/placeholder/400/300" alt="Leggings Guide">
                    <div class="read-content">
                        <h3>The Best Nike Leggings for Kids</h3>
                        <p>Explore comfy, versatile Nike leggings for kids.</p>
                    </div>
                </div>
                <div class="slide read-card">
                    <img src="/api/placeholder/400/300" alt="Sports Bra Guide">
                    <div class="read-content">
                        <h3>Girls Sports Bra Fit Guide</h3>
                        <p>Finding the perfect bra fit with the right support.</p>
                    </div>
                </div>
            </div>
            <div class="slider-nav">
                <button class="slider-button prev" onclick="slideReadsKids(-1)">←</button>
                <button class="slider-button next" onclick="slideReadsKids(1)">→</button>
            </div>
        </div>
    </section>

    <min class="min">
        <div class="min-grid">
            <div class="min-col">
                <h3>Kid's Shoes</h3>
                <ul>
                    <li><a href="#">Kids' Astro Boots</a></li>
                    <li><a href="#">Nike Air Max 270 Kids</a></li>
                    <li><a href="#">Kids' Gym Shoes</a></li>
                </ul>
            </div>
            <div class="min-col">
                <h3>Kids' Clothing</h3>
                <ul>
                    <li><a href="#">Boys' Tracksuit Sale</a></li>
                    <li><a href="#">Baby & Toddler Clothes</a></li>
                    <li><a href="#">Kids' Puffer Jacket</a></li>
                </ul>
            </div>
            <div class="min-col">
                <h3>Kids' Gear</h3>
                <ul>
                    <li><a href="#">Football Gloves</a></li>
                    <li><a href="#">Kids' Football Kits</a></li>
                    <li><a href="#">Kids' NBA</a></li>
                </ul>
            </div>
            <div class="min-col">
                <h3>Featured</h3>
                <ul>
                    <li><a href="#">Swimwear</a></li>
                    <li><a href="#">Nike Run Club</a></li>
                    <li><a href="#">Nike Training Club</a></li>
                </ul>
            </div>
        </div>
    </min>


    <!-- Footer -->
    <?php include('../components/footer.php'); ?>

    <script>
        /* kids functionality */
        /* Slider functionality */
        let latestPositionKids = 0;
        let iconsPositionKids = 0;
        let readsPositionKids = 0;

        function updateSliderPositionKids(sliderId, position) {
            const slider = document.getElementById(sliderId);
            if (slider) {
                slider.style.transform = `translateX(${position}px)`;
            }
        }

        function getSlideWidthKids(sliderId) {
            const slider = document.getElementById(sliderId);
            if (!slider) return 0;
            const slide = slider.querySelector('.slide');
            if (!slide) return 0;
            return slide.offsetWidth + parseInt(getComputedStyle(slide).marginRight);
        }

        function slideLatestKids(direction) {
            const slideWidth = getSlideWidthKids('latestSliderKids');
            const maxSlides = document.querySelectorAll('#latestSliderKids .slide').length;
            const visibleSlides = 3;
            const maxPosition = -(slideWidth * (maxSlides - visibleSlides));

            latestPositionKids += direction * slideWidth;
            if (latestPositionKids > 0) latestPositionKids = maxPosition;
            if (latestPositionKids < maxPosition) latestPositionKids = 0;

            updateSliderPositionKids('latestSliderKids', latestPositionKids);
        }

        function slideIconsKids(direction) {
            const slideWidth = getSlideWidthKids('iconsSliderKids');
            const maxSlides = document.querySelectorAll('#iconsSliderKids .slide').length;
            const visibleSlides = 3;
            const maxPosition = -(slideWidth * (maxSlides - visibleSlides));

            iconsPositionKids += direction * slideWidth;
            if (iconsPositionKids > 0) iconsPositionKids = maxPosition;
            if (iconsPositionKids < maxPosition) iconsPositionKids = 0;

            updateSliderPositionKids('iconsSliderKids', iconsPositionKids);
        }

        function slideReadsKids(direction) {
            const slideWidth = getSlideWidthKids('readsSliderKids');
            const maxSlides = document.querySelectorAll('#readsSliderKids .slide').length;
            const visibleSlides = 2;
            const maxPosition = -(slideWidth * (maxSlides - visibleSlides));

            readsPositionKids += direction * slideWidth;
            if (readsPositionKids > 0) readsPositionKids = maxPosition;
            if (readsPositionKids < maxPosition) readsPositionKids = 0;

            updateSliderPositionKids('readsSliderKids', readsPositionKids);
        }

        // Initialize sliders and add window resize handler
        document.addEventListener('DOMContentLoaded', () => {
            // Reset positions when window is resized
            window.addEventListener('resize', () => {
                latestPositionKids = 0;
                iconsPositionKids = 0;
                readsPositionKids = 0;
                updateSliderPositionKids('latestSliderKids', 0);
                updateSliderPositionKids('iconsSliderKids', 0);
                updateSliderPositionKids('readsSliderKids', 0);
            });
        });
        /* End kids functionality */
    </script>
</body>

</html>