<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="main">
      <div id="page1">
        <video controls autoplay id="bg-video">
            <source src="oo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div id="header">
            <div id="logo">
                <img src="ri.webp" alt="">
            </div>
            <div id="nav">
                <div class="text"><a href="solution.html">Solution</a></div>
                <div class="text"><a href="pricing.html">Pricing</a></div>
                <div class="text"><a href="exclusive.html">Exclusive</a></div>
                <div class="text"><a href="about.html">About</a></div>
                <div class="text"><a href="today.html">Todays Deals</a></div>
              </div>
    <div id="button">
                <div id="trial"><a href="#">Trial button</a></div>
        <div id="user">
            <?php
            if (isset($_SESSION['username'])) {
                echo "Welcome, " . htmlspecialchars($_SESSION['username']);
                echo ' | <a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.html">Login</a>';
            }
            ?>
        </div>
        <a href="cart.html" class="view-cart">View Cart (<span id="cart-count">0</span>)</a>



    </div>
    
        </div>
        <div id="fakehead"></div>
        <div id="content">
            <div id="div1">
                <h1>Be the Next<br>
                Unicorn Startup
            <br>
            Dream big, build fast, and grow far on Shopify.</h1>
            </div>
            <div id="div3"><h1>Medal Worthy Brands To Bag</h1></div>
        </div>
        <div id="footer"></div>
      </div>
      <div id="page2">
        <div class="modern-product-showcase">
            <!-- Hero Video Banner -->
            <div class="hero-banner">
                <video autoplay muted loop playsinline>
                    <source src="https://assets.mixkit.co/videos/preview/mixkit-woman-holding-shopping-bags-while-walking-17755-large.mp4" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <div class="hero-content">
                    <h1>Discover More Products</h1>
                    <p>Curated just for you based on your preferences</p>
                    <button class="cta-button">Explore Collection</button>
                </div>
            </div>
    
            <!-- Interactive Product Tabs -->
            <div class="product-tabs">
                <div class="tab-header">
                    <div class="tab active" data-tab="recommended">Recommended For You</div>
                    <div class="tab" data-tab="trending">Trending Now</div>
                    <div class="tab" data-tab="deals">Hot Deals</div>
                    <div class="tab-indicator"></div>
                </div>
                
                <div class="tab-content active" id="recommended">
                    <div class="product-grid">
                        <!-- Product cards will be loaded via JavaScript -->
                    </div>
                </div>
                
                <div class="tab-content" id="trending">
                    <div class="product-grid">
                        <!-- Content will be loaded dynamically -->
                    </div>
                </div>
                
                <div class="tab-content" id="deals">
                    <div class="product-grid">
                        <!-- Content will be loaded dynamically -->
                    </div>
                </div>
            </div>
        </div>
      </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product data
        const products = {
            recommended: [
                {
                    id: 1,
                    title: "Lenovo IdeaPad Slim 5",
                    price: "₹52,199",
                    originalPrice: "₹74,570",
                    discount: "30% OFF",
                    image: "https://p3-ofp.static.pub//fes/cms/2024/04/26/9baeg6lkjpenfevi2afhyjd7gp4kkt943777.png",
                    badge: "BESTSELLER",
                    rating: 4.5
                },
                {
                    id: 2,
                    title: "Apple iPad (10th Gen)",
                    price: "₹33,399",
                    originalPrice: "₹35,900",
                    discount: "5% OFF",
                    image: "https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/store-card-40-bts-edu-macbook-air-ipad-air-202503?wid=800&hei=1000&fmt=p-jpg&qlt=95&.v=1739502784046",
                    badge: "NEW",
                    rating: 4.8
                },
                {
                    id: 3,
                    title: "Rosewood Acoustic Guitar",
                    price: "₹12,999",
                    originalPrice: "₹15,999",
                    discount: "19% OFF",
                    image: "https://yamaha.ndcdn.in/media/catalog/product/cache/263be203fdb4831fcff24348c255c941/f/6/f620_1.jpg",
                    badge: "LIMITED",
                    rating: 4.7
                },
                {
                    id: 4,
                    title: "Sony WH-1000XM5 Headphones",
                    price: "₹29,990",
                    originalPrice: "₹32,990",
                    discount: "9% OFF",
                    image: "https://in.jbl.com/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dwca9d65c5/1.JBL_Tune_770NC_Product%20Image_Hero_Black.png?sw=535&sh=535",
                    badge: "TRENDING",
                    rating: 4.9
                }
            ],
            trending: [
                {
                    id: 5,
                    title: "Samsung Galaxy Book4",
                    price: "₹41,990",
                    originalPrice: "₹57,990",
                    discount: "27% OFF",
                    image: "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSg17T2IkUFWC9rJbG5P1PpxyALn6AKI0BRlM1n2YdjEQOZHKg",
                    badge: "HOT",
                    rating: 4.6
                },
                {
                    id: 6,
                    title: "Motorola Edge 40",
                    price: "₹24,999",
                    originalPrice: "₹29,999",
                    discount: "17% OFF",
                    image: "https://images-cdn.ubuy.co.in/67263f0731bf58698c1f2960-motorola-g85-5g-12gb-256gb-poled-120.jpg",
                    badge: "POPULAR",
                    rating: 4.4
                },
                {
                    id: 7,
                    title: "PROWL Hand Grips",
                    price: "₹499",
                    originalPrice: "₹799",
                    discount: "38% OFF",
                    image: "https://rukminim1.flixcart.com/image/300/300/xif0q/fitness-grip/p/4/n/adjustable-strengthener-finger-exerciser-pfg2-prowl-original-imahfvhwg34m5kr3.jpeg",
                    badge: "DEAL",
                    rating: 4.2
                },
                {
                    id: 8,
                    title: "Nike Air Max 270",
                    price: "₹10,495",
                    originalPrice: "₹12,995",
                    discount: "19% OFF",
                    image: "https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/skwgyqrbfzhu6uyeh0gg/air-max-270-mens-shoes-KkLcGR.png",
                    badge: "TRENDING",
                    rating: 4.7
                }
            ],
            deals: [
                {
                    id: 9,
                    title: "OnePlus Nord CE 3",
                    price: "₹24,999",
                    originalPrice: "₹28,999",
                    discount: "14% OFF",
                    image: "https://image01-in.oneplus.net/media/202407/04/33f3107e4204f5f6f418074a84c39205.png?x-amz-process=image/format,webp/quality,Q_80",
                    badge: "FLASH SALE",
                    rating: 4.5
                },
                {
                    id: 10,
                    title: "Boat Airdopes 441",
                    price: "₹1,299",
                    originalPrice: "₹2,990",
                    discount: "57% OFF",
                    image: "https://www.boat-lifestyle.com/cdn/shop/files/ACCG6DS7WDJHGWSH_0_800x.png?v=1727669669",
                    badge: "MEGA DEAL",
                    rating: 4.3
                },
                {
                    id: 11,
                    title: "Amazon Echo Dot",
                    price: "₹3,499",
                    originalPrice: "₹4,499",
                    discount: "22% OFF",
                    image: "https://m.media-amazon.com/images/I/61WUqJd4dfS._SL1000_.jpg",
                    badge: "DEAL",
                    rating: 4.6
                },
                {
                    id: 12,
                    title: "Mi 80cm Smart TV",
                    price: "₹24,999",
                    originalPrice: "₹34,999",
                    discount: "29% OFF",
                    image: "https://m.media-amazon.com/images/I/41Jb0GmVcZL._SX300_SY300_QL70_FMwebp_.jpg",
                    badge: "HOT DEAL",
                    rating: 4.4
                }
            ]
        };
    
        // Tab functionality
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        const tabIndicator = document.querySelector('.tab-indicator');
        
        // Set initial tab indicator position
        const activeTab = document.querySelector('.tab.active');
        tabIndicator.style.width = `${activeTab.offsetWidth}px`;
        tabIndicator.style.left = `${activeTab.offsetLeft}px`;
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Move indicator
                tabIndicator.style.width = `${tab.offsetWidth}px`;
                tabIndicator.style.left = `${tab.offsetLeft}px`;
                
                // Show corresponding content
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
                
                // Load products if not already loaded
                if (document.getElementById(tabId).querySelector('.product-card') === null) {
                    renderProducts(tabId);
                }
            });
        });
        
        // Render product cards
        function renderProducts(tabId) {
            const productGrid = document.getElementById(tabId).querySelector('.product-grid');
            productGrid.innerHTML = '';
            
            products[tabId].forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
                    ${product.badge ? `<span class="product-badge">${product.badge}</span>` : ''}
                    <img src="${product.image}" alt="${product.title}" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">${product.title}</h3>
                        <div class="product-price">
                            ${product.price}
                            ${product.originalPrice ? `<span class="original">${product.originalPrice}</span>` : ''}
                            ${product.discount ? `<span class="product-discount">${product.discount}</span>` : ''}
                        </div>
                        <div class="product-rating">
                            ${generateStarRating(product.rating)}
                            <span>(${Math.floor(Math.random() * 100) + 50})</span>
                        </div>
                        <div class="product-actions">
                            <button class="action-button"><i class="far fa-heart"></i></button>
                            <button class="action-button"><i class="far fa-eye"></i></button>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                `;
                productGrid.appendChild(productCard);
                
                // Add click event to product card
                productCard.addEventListener('click', function(e) {
                    if (!e.target.closest('.action-button') && !e.target.closest('.add-to-cart')) {
                        window.location.href = `product${product.id}.html`;
                    }
                });
            });
        }
        
        // Generate star rating HTML
        function generateStarRating(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;
            
            for (let i = 1; i <= 5; i++) {
                if (i <= fullStars) {
                    stars += '<i class="fas fa-star"></i>';
                } else if (i === fullStars + 1 && hasHalfStar) {
                    stars += '<i class="fas fa-star-half-alt"></i>';
                } else {
                    stars += '<i class="far fa-star"></i>';
                }
            }
            
            return stars;
        }
        
        // Load initial products
        renderProducts('recommended');
        
        // Add to cart functionality
        // Add to cart functionality
        document.addEventListener('click', function(e) {
    if (e.target.classList.contains('add-to-cart') || e.target.closest('.add-to-cart')) {
        const productCard = e.target.closest('.product-card');
        const productTitle = productCard.querySelector('.product-title').textContent;
        const productPrice = productCard.querySelector('.product-price').textContent.split('\n')[0].trim();
        const productImage = productCard.querySelector('.product-image').src;

        // Store to localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push({ title: productTitle, price: productPrice, image: productImage });
        localStorage.setItem('cart', JSON.stringify(cart));

        // Update cart count
        updateCartCount();

        // Animation
        const button = e.target.closest('button');
        button.innerHTML = '<i class="fas fa-check"></i> Added';
        button.style.backgroundColor = '#4BB543';

        setTimeout(() => {
            button.textContent = 'Add to Cart';
            button.style.backgroundColor = '';
        }, 2000);

        console.log(`Added to cart: ${productTitle} - ${productPrice}`);
    }
});
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    document.getElementById('cart-count').textContent = cart.length;
}

// Call on page load
document.addEventListener('DOMContentLoaded', updateCartCount);

        
        // Wishlist functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fa-heart') || e.target.closest('.fa-heart')) {
                const heartIcon = e.target.classList.contains('fa-heart') ? e.target : e.target.querySelector('.fa-heart');
                heartIcon.classList.toggle('far');
                heartIcon.classList.toggle('fas');
                heartIcon.classList.toggle('text-danger');
                
                const productCard = e.target.closest('.product-card');
                const productTitle = productCard.querySelector('.product-title').textContent;
                
                if (heartIcon.classList.contains('fas')) {
                    console.log(`Added to wishlist: ${productTitle}`);
                } else {
                    console.log(`Removed from wishlist: ${productTitle}`);
                }
            }
        });
    });
    </script>
      <div id="footer">
        <div class="footer-container">
          
          <!-- About Section -->
          <div class="footer-column">
            <h3>About Us</h3>
            <p>We are dedicated to empowering businesses with innovative solutions. Grow your brand with us!</p>
          </div>
          
          <!-- Quick Links Section -->
          <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="solution.html">Solutions</a></li>
              <li><a href="pricing.html">Pricing</a></li>
              <li><a href="resource.html">Resources</a></li>
              <li><a href="enterprise.html">Enterprise</a></li>
              <li><a href="whats-new.html">What's New</a></li>
            </ul>
          </div>
          
          <!-- Contact Section -->
          <div class="footer-column">
            <h3>Contact Us</h3>
            <p>Email: support@yourcompany.com</p>
            <p>Phone: +1 234 567 890</p>
            <p>Address: 123 Business Ave, Startup City</p>
          </div>
          
          <!-- Social Media Section -->
          <div class="footer-column">
            <h3>Follow Us</h3>
            <div class="social-icons">
              <a href="https://www.facebook.com/login/"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
              <a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a>
              <a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a>
              <a href="#"> <i class="fa-brands fa-linkedin"></i> Linkedin</a>
            </div>
          </div>
        </div>
      
        <p class="footer-bottom">© 2025 
            NextGen Commerce. All rights reserved.</p>
      </div>
      
    </div>
</body>
</html>