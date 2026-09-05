<x-layout>
    <!-- Custon Styles -->
    <style>
        /* Custom scrollbar styling */
        .product-scroll::-webkit-scrollbar {
            height: 6px;
            width: 6px;
        }
        
        .product-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .product-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        .product-scroll::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        
        /* Hide scrollbar when not needed */
        .product-scroll {
            scrollbar-width: thin;
            scrollbar-color: #667eea #f1f1f1;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Product card hover effects */
        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        /* Price tag gradient */
        .price-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Category badge */
        .category-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Hero overlay */
        .hero-overlay {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8), transparent);
        }
        
        /* Skeleton loading */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite linear;
        }
        
        /* Navigation arrows */
        .nav-arrow {
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            opacity: 0;
        }
        
        .products-container:hover .nav-arrow {
            opacity: 1;
        }
        
        .nav-arrow:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-arrow {
                display: none;
            }
            
            .product-scroll {
                scrollbar-width: none;
            }
            
            .product-scroll::-webkit-scrollbar {
                display: none;
            }
        }
    </style>

    <!-- Navigation Component (Keep your existing x-user-nav) -->
    <x-user-nav />
    <x-flash/>
    <!-- Hero Section -->
    <div class="container mx-auto px-4 my-6">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl animate-fade-in-up">
            <img src="https://market-resized.envatousercontent.com/previews/files/658521268/screenshots/01_preview.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=c3b64a06f8129642b16a2b2dd86d72a19b756fd308efe8ba51ae395c5f6e60d6" 
                 alt="Shop Now - Exclusive Deals"
                 class="w-full h-64 md:h-80 object-cover transform transition-transform duration-700 hover:scale-105">
            
            <div class="absolute inset-0 hero-overlay flex items-center">
                <div class="ml-8 md:ml-16 text-white max-w-lg">
                    <h1 class="text-3xl md:text-4xl font-bold mb-3">Exclusive Deals</h1>
                    <p class="text-lg opacity-90 mb-6">Discover amazing products at unbeatable prices</p>
                    <button class="px-8 py-3 bg-gradient-to-r from-pink-500 to-purple-600 
                                rounded-full font-semibold hover:shadow-2xl transform 
                                hover:-translate-y-1 transition-all duration-300">
                        Shop Now <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
            
            <!-- Deal Badge -->
            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-lg p-3">
                <div class="text-center">
                    <div class="text-2xl font-bold text-red-600">UP TO 70% OFF</div>
                    <div class="text-xs text-gray-600">Limited Time Offer</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    @if (count($products) > 0)
    <div class="container mx-auto px-4 my-12">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8 animate-fade-in-up">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                    <i class="bi bi-lightning-charge-fill text-yellow-500 mr-3 text-2xl"></i>
                    Top Deals
                </h2>
                <p class="text-gray-600 mt-2">Don't miss out on these limited time offers</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="px-4 py-2 bg-gradient-to-r from-blue-50 to-purple-50 
                          rounded-full text-sm font-semibold text-blue-600 border border-blue-100">
                    {{ count($products) }} Products
                </span>
            </div>
        </div>

        <!-- Products Container -->
        <div class="relative products-container">
            <!-- Navigation Arrows -->
            <button class="nav-arrow left-arrow absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-20 
                         w-12 h-12 flex justify-center items-center bg-white shadow-2xl rounded-full">
                <i class="bi bi-chevron-left text-2xl text-gray-800"></i>
            </button>
            
            <button class="nav-arrow right-arrow absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-20 
                         w-12 h-12 flex justify-center items-center bg-white shadow-2xl rounded-full">
                <i class="bi bi-chevron-right text-2xl text-gray-800"></i>
            </button>

            <!-- Products Scroll Container -->
            <div class="flex gap-6 product-scroll overflow-x-auto pb-6 scroll-smooth px-2">
                @foreach ($products as $item)
                    <a href="/category/{{ $item['category'] }}" 
                       class="product-card group bg-white rounded-2xl shadow-lg overflow-hidden 
                              shrink-0 w-64 border border-gray-100 hover:border-transparent">
                        
                        <!-- Product Image Container -->
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <img src="{{ asset('storage/' . $item['product_image']) }}" 
                                 alt="{{ $item['product_name'] }}"
                                 class="product-image w-full h-full object-contain p-4 transition-transform duration-500">
                            
                            <!-- Quick View Overlay -->
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center 
                                     opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="px-4 py-2 bg-white text-gray-800 rounded-lg font-semibold text-sm">
                                    Quick View
                                </span>
                            </div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="category-badge px-3 py-1 text-white text-xs font-bold rounded-full">
                                    {{ $item['category'] }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="p-5">
                            <!-- Product Name -->
                            <h5 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2 h-12">
                                {{ $item['product_name'] }}
                            </h5>
                            
                            <!-- Price Section -->
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <span class="text-xs text-gray-500">Starting from</span>
                                    <h4 class="price-gradient text-2xl font-bold mt-1">
                                        Rs. {{ number_format($item['main_price']) }}
                                    </h4>
                                </div>
                                
                                <!-- Rating Badge -->
                                <div class="px-3 py-1 bg-gradient-to-r from-blue-50 to-purple-50 
                                          rounded-full border border-blue-100">
                                    <span class="text-xs font-semibold text-blue-600 flex items-center">
                                        <i class="bi bi-star-fill text-yellow-500 mr-1"></i>
                                        Hot Deal
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <button class="w-full mt-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600 
                                        text-white rounded-lg font-semibold hover:shadow-lg 
                                        transform hover:-translate-y-0.5 transition-all duration-300
                                        group-hover:shadow-purple-200">
                                View Details
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            
                            <!-- Additional Info -->
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100 text-xs text-gray-500">
                                <div class="flex items-center">
                                    <i class="bi bi-truck mr-2"></i>
                                    <span>Free Delivery</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-arrow-clockwise mr-2"></i>
                                    <span>Easy Returns</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- Scroll Indicators -->
        <div class="flex justify-center mt-8">
            <div class="flex space-x-2">
                @foreach ($products as $index => $item)
                    <div class="w-2 h-2 rounded-full bg-gray-300 scroll-indicator 
                              {{ $index === 0 ? 'bg-gradient-to-r from-blue-500 to-purple-600 w-6' : '' }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <!-- Empty State -->
    <div class="container mx-auto px-4 my-16">
        <div class="max-w-md mx-auto text-center animate-fade-in-up">
            <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 
                     flex items-center justify-center">
                <i class="bi bi-emoji-frown text-5xl text-gray-400"></i>
            </div>
            <h4 class="text-2xl font-bold text-gray-700 mb-3">
                No Active Deals Available
            </h4>
            <p class="text-gray-500 mb-8">
                Check back soon for amazing offers and discounts!
            </p>
            <button class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 
                        text-white rounded-lg font-semibold hover:shadow-lg 
                        transform hover:-translate-y-1 transition-all duration-300">
                Browse All Categories
            </button>
        </div>
    </div>
    @endif

    <!-- Featured Categories -->
    @if (count($products) > 0)
    <div class="container mx-auto px-4 my-16 animate-fade-in-up">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">
            Shop by Category
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $uniqueCategories = collect($products)->unique('category')->take(4);
            @endphp
            
            @foreach ($uniqueCategories as $item)
                <a href="/category/{{ $item['category'] }}" 
                   class="group relative overflow-hidden rounded-2xl">
                    <div class="h-64 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl 
                              p-6 flex flex-col justify-between transform group-hover:scale-105 
                              transition-transform duration-500">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">
                                {{ $item['category'] }}
                            </h4>
                            <p class="text-gray-600 text-sm">Explore collection</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 
                                       text-white rounded-lg text-sm font-semibold group-hover:shadow-lg 
                                       transition-all duration-300">
                                Shop Now →
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Newsletter Section -->
    <div class="container mx-auto px-4 my-16">
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-8 text-center animate-fade-in-up">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
                    Get Exclusive Deals
                </h3>
                <p class="text-gray-600 mb-6">
                    Subscribe to our newsletter and be the first to know about special offers
                </p>
                <form class="flex flex-col md:flex-row gap-4 max-w-md mx-auto">
                    @csrf
                    <input type="email" 
                           placeholder="Enter your email" 
                           required
                           class="flex-1 px-6 py-3 rounded-full border border-gray-300 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 
                                  focus:border-transparent">
                    <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 
                                   text-white rounded-full font-semibold hover:shadow-xl 
                                   transform hover:-translate-y-1 transition-all duration-300">
                        Subscribe
                    </button>
                </form>
                <p class="text-gray-500 text-sm mt-4">
                    By subscribing, you agree to our Privacy Policy
                </p>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        // DOM Elements
        const rightArrow = document.querySelector('.right-arrow');
        const leftArrow = document.querySelector('.left-arrow');
        const productScroll = document.querySelector('.product-scroll');
        const scrollIndicators = document.querySelectorAll('.scroll-indicator');
        
        // Scroll amount per click (adjust based on your card width + gap)
        const scrollAmount = 272; // 64 * 4 + 24 (w-64 = 256px + 24px gap)
        
        // Current scroll position indicator
        let currentScrollIndex = 0;
        
        // Initialize scroll indicators
        function updateScrollIndicators() {
            const scrollPosition = productScroll.scrollLeft;
            const cardCount = document.querySelectorAll('.product-card').length;
            const visibleCards = Math.floor(productScroll.clientWidth / scrollAmount);
            
            // Calculate current index
            currentScrollIndex = Math.round(scrollPosition / scrollAmount);
            
            // Update indicators
            scrollIndicators.forEach((indicator, index) => {
                if (index === currentScrollIndex) {
                    indicator.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-purple-600', 'w-6');
                    indicator.classList.remove('bg-gray-300');
                } else {
                    indicator.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-purple-600', 'w-6');
                    indicator.classList.add('bg-gray-300');
                    indicator.style.width = '8px';
                }
            });
        }
        
        // Right arrow click with boundary check
        rightArrow.addEventListener('click', () => {
            const maxScroll = productScroll.scrollWidth - productScroll.clientWidth;
            
            if (productScroll.scrollLeft < maxScroll - scrollAmount) {
                productScroll.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth"
                });
            } else {
                // If at the end, scroll to beginning
                productScroll.scrollTo({
                    left: 0,
                    behavior: "smooth"
                });
            }
            
            // Update indicators after scroll
            setTimeout(updateScrollIndicators, 300);
        });
        
        // Left arrow click with boundary check
        leftArrow.addEventListener('click', () => {
            if (productScroll.scrollLeft > scrollAmount) {
                productScroll.scrollBy({
                    left: -scrollAmount,
                    behavior: "smooth"
                });
            } else {
                // If at the beginning, scroll to end
                productScroll.scrollTo({
                    left: productScroll.scrollWidth,
                    behavior: "smooth"
                });
            }
            
            // Update indicators after scroll
            setTimeout(updateScrollIndicators, 300);
        });
        
        // Update indicators on scroll
        productScroll.addEventListener('scroll', updateScrollIndicators);
        
        // Click on indicators to scroll to specific position
        scrollIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                productScroll.scrollTo({
                    left: index * scrollAmount,
                    behavior: "smooth"
                });
                currentScrollIndex = index;
                updateScrollIndicators();
            });
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                rightArrow.click();
            } else if (e.key === 'ArrowLeft') {
                leftArrow.click();
            }
        });
        
        // Hover effects for arrows
        [rightArrow, leftArrow].forEach(arrow => {
            arrow.addEventListener('mouseenter', () => {
                arrow.style.transform = 'scale(1.1) translateY(-50%)';
                arrow.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.2)';
            });
            
            arrow.addEventListener('mouseleave', () => {
                arrow.style.transform = 'scale(1) translateY(-50%)';
                arrow.style.boxShadow = '';
            });
        });
        
        // Auto-scroll functionality
        let autoScrollInterval;
        
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                // Only auto-scroll if user is not hovering over the products
                if (!productScroll.matches(':hover')) {
                    const maxScroll = productScroll.scrollWidth - productScroll.clientWidth;
                    
                    if (productScroll.scrollLeft >= maxScroll - 10) {
                        // If at the end, scroll to beginning
                        productScroll.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        // Scroll to next set of products
                        productScroll.scrollBy({
                            left: scrollAmount,
                            behavior: 'smooth'
                        });
                    }
                    
                    updateScrollIndicators();
                }
            }, 5000); // Change every 5 seconds
        }
        
        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }
        
        // Start auto-scroll
        startAutoScroll();
        
        // Pause auto-scroll on hover
        productScroll.addEventListener('mouseenter', stopAutoScroll);
        productScroll.addEventListener('mouseleave', startAutoScroll);
        
        // Initialize indicators on load
        document.addEventListener('DOMContentLoaded', () => {
            updateScrollIndicators();
            
            // Add hover effect to product cards
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.zIndex = '10';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.zIndex = '';
                });
            });
            
            // Add loading animation to images
            document.querySelectorAll('.product-image').forEach(img => {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
                
                // Fallback for already loaded images
                if (img.complete) {
                    img.classList.add('loaded');
                }
            });
        });
        
        // Add CSS for loaded images
        const style = document.createElement('style');
        style.textContent = `
            .product-image {
                transition: opacity 0.3s ease, transform 0.5s ease;
            }
            
            .product-image:not(.loaded) {
                opacity: 0;
            }
            
            .product-image.loaded {
                opacity: 1;
            }
            
            @media (max-width: 640px) {
                .product-card {
                    width: 200px;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</x-layout>