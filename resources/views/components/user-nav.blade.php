<div class="sticky top-0 z-50 bg-white shadow-md border-b border-gray-100">
    <div class="container mx-auto px-4">
        <!-- Top Bar -->
        <div class="flex items-center justify-between py-3">
            <!-- Mobile Menu Button -->
            <button class="lg:hidden w-10 h-10 rounded-lg flex items-center justify-center hover:bg-gray-100 transition-colors">
                <i class="bi bi-list text-2xl text-gray-700"></i>
            </button>

            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2 group">


                    
                    

<div class="flex items-center space-x-4">
    <div class="px-6 py-3 bg-gradient-to-br from-gray-900 via-black
     to-purple-900 text-white rounded-full text-lg font-bold shadow-2xl
      hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-1 group">
        <div class="flex items-center justify-center space-x-3">
            <!-- Animated diamond icon with sparkle effect -->
            <div class="relative">
                {{-- <i class="bi bi-diamond-fill text-2xl bg-gradient-to-br from-purple-400 to-purple-700 group-hover:from-purple-300 group-hover:to-purple-500 transition-all duration-300 transform group-hover:rotate-12"></i> --}}
                <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <!-- Sparkle dots -->
                <div class="absolute -top-1 -right-1 w-2 h-2 bg-purple-300 rounded-full animate-pulse"></div>
                <div class="absolute -bottom-1 -left-1 w-1.5 h-1.5 bg-purple-200 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
            </div>
            
            <!-- Text with gradient and glow effect -->
            <span class="relative">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-200 via-purple-100 to-purple-300 font-bold tracking-wide text-xl">
                    Amethyst.pk
                </span>
                <!-- Text glow effect -->
                <span class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur opacity-0 group-hover:opacity-20 transition-opacity duration-300 -z-10"></span>
            </span>
        </div>
    </div>
</div>







                    
                </a>
            </div>

            <!-- Search Bar (Desktop) -->
            <div class="hidden lg:flex flex-1 max-w-2xl mx-6">
                <div class="relative w-full group">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    <div class="relative flex items-center">
                        <i class="bi bi-search absolute left-4 text-gray-400 z-10"></i>
                        <input type="text" 
                               placeholder="Search for products, brands and more..." 
                               class="w-full pl-12 pr-32 py-3 rounded-full border border-gray-200 focus:border-transparent focus:ring-2 focus:ring-purple-500 focus:outline-none bg-white/50 backdrop-blur-sm relative z-20">
                        <button class="absolute right-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-full hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 z-20">
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-4">
                <!-- User Profile -->
                <div class="group relative">
                    <div class="flex items-center space-x-2 px-4 py-2 rounded-full hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 cursor-pointer transition-all duration-300">
                        @auth
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="hidden lg:block font-medium text-gray-700">
                            {{ auth()->user()->name }}
                        </span>
                        {{-- <i class="bi bi-chevron-down text-sm text-gray-400 group-hover:text-purple-500 transition-colors"></i> --}}
                        @endauth

                        @guest
                        <i class="bi bi-person-circle text-xl text-gray-600"></i>
                        <a href="/login" class="hidden lg:block font-medium text-gray-700 hover:text-purple-600 transition-colors">
                            Login
                        </a>
                        @endguest
                        <i class="bi bi-chevron-down text-sm text-gray-400 group-hover:text-purple-500 transition-colors"></i>  
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 top-full mt-2 w-72 bg-white rounded-2xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <!-- Header -->
                        <div class="p-5 bg-gradient-to-r from-purple-50 to-pink-50 rounded-t-2xl">
                            @auth
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-white font-bold text-lg">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800">{{ auth()->user()->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            @endauth

                            @guest
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-800 font-semibold">New Customer?</h3>
                                <a href="/signup" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-sm">
                                    Sign Up
                                </a>
                            </div>
                            @endguest
                        </div>

                        <!-- Menu Items -->
                        <ul class="py-2">
                            <li>
                                <a href="/profile" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center group-hover:bg-purple-500 transition-colors">
                                        <i class="bi bi-person text-purple-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">My Profile</span>
                                </a>
                            </li>

                            <li>
                                {{-- <a href="/plus" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center group-hover:bg-yellow-500 transition-colors">
                                        <i class="bi bi-stars text-yellow-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">Premium Zone</span>
                                    <span class="ml-auto px-2 py-1 bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs rounded-full">NEW</span>
                                </a> --}}
                            </li>

                            <li>
                                <a href="/orders" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                        <i class="bi bi-box-seam text-blue-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">Orders</span>
                                    @auth
                                    <span class="ml-auto px-2 py-1 bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-xs rounded-full">3 new</span>
                                    @endif
                                </a>
                            </li>

                            <li>
                                <a href="" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-pink-100 flex items-center justify-center group-hover:bg-pink-500 transition-colors">
                                        <i class="bi bi-heart text-pink-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">Wishlist</span>
                                    @auth
                                    <span class="ml-auto px-2 py-1 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs rounded-full">12</span>
                                    @endif
                                </a>
                            </li>

                            <li>
                                <a href="" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center group-hover:bg-green-500 transition-colors">
                                        <i class="bi bi-gift text-green-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">Rewards</span>
                                    <span class="ml-auto px-2 py-1 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs rounded-full">500 pts</span>
                                </a>
                            </li>

                            <li>
                                {{-- <a href="/gift-cards" class="flex items-center gap-3 px-5 py-3 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group">
                                    <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-500 transition-colors">
                                        <i class="bi bi-credit-card text-indigo-500 group-hover:text-white"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-purple-600 font-medium">Gift Cards</span>
                                </a> --}}
                            </li>

                            <!-- Logout Section for Authenticated Users -->
                            @auth
                            <li class="border-t border-gray-100 mt-2">
                                <form action="/logout" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-5 py-3 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-200 group">
                                        <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center group-hover:bg-red-500 transition-colors">
                                            <i class="bi bi-box-arrow-right text-red-500 group-hover:text-white"></i>
                                        </div>
                                        <span class="text-gray-700 group-hover:text-red-600 font-medium">Logout</span>
                                    </button>
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>

                <!-- Cart -->
                <div class="relative group">
                    <a href="/addition" class="flex flex-col items-center p-2 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300">
                        <div class="relative">
                            <i class="bi bi-cart3 text-2xl text-gray-600 group-hover:text-purple-600 transition-colors"></i>
                            <span class="absolute -top-2 -right-2 w-5 h-5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full flex items-center justify-center font-bold animate-pulse">
                                3
                            </span>
                        </div>
                        <span class="hidden lg:block text-xs mt-1 text-gray-600 group-hover:text-purple-600 font-medium">Cart</span>
                    </a>
                </div>

                <!-- Become a Seller -->
                {{-- <div class="group hidden xl:flex items-center px-4 py-2 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 cursor-pointer transition-all duration-300">
                    <i class="bi bi-shop text-xl text-gray-600 group-hover:text-purple-600 transition-colors"></i>
                    <span class="ml-2 font-medium text-gray-700 group-hover:text-purple-600">Become a Seller</span>
                </div> --}}

                <!-- More Options -->
                <div class="group relative">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 cursor-pointer transition-all duration-300">
                        <i class="bi bi-three-dots-vertical text-xl text-gray-600 group-hover:text-purple-600"></i>
                    </div>
                    
                    <!-- More Options Dropdown -->
                    <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <div class="p-2">
                            <a href="/notifications" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200">
                                <i class="bi bi-bell text-gray-500"></i>
                                <span class="text-gray-700">Notifications</span>
                                <span class="ml-auto px-2 py-1 bg-red-500 text-white text-xs rounded-full">5</span>
                            </a>
                            <a href="/customer-care" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200">
                                <i class="bi bi-headset text-gray-500"></i>
                                <span class="text-gray-700">Feedback</span>
                            </a>
                            {{-- <a href="/download-app" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200">
                                <i class="bi bi-download text-gray-500"></i>
                                <span class="text-gray-700">Download App</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Search Bar -->
        <div class="lg:hidden mb-4">
            <div class="relative">
                <i class="bi bi-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" 
                       placeholder="Search products..." 
                       class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 focus:outline-none">
            </div>
        </div>

        <!-- Categories Navigation -->
        <div class="hidden lg:flex items-center justify-between py-3 border-t border-gray-100">
            <div class="flex items-center space-x-6">

             <a href="/" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 flex items-center justify-center group-hover:from-green-500 group-hover:to-emerald-500 transition-all duration-300">
                        <i class="bi bi-house-door text-green-500 group-hover:text-white"></i>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-green-600 transition-colors">Home</span>
                </a>


                <a href="/category/electronics" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-blue-100 to-cyan-100 flex items-center justify-center group-hover:from-blue-500 group-hover:to-cyan-500 transition-all duration-300">
                        <i class="bi bi-laptop text-blue-500 group-hover:text-white"></i>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-blue-600 transition-colors">Electronics</span>
                </a>

                <a href="/category/fashion" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-pink-100 to-rose-100 flex items-center justify-center group-hover:from-pink-500 group-hover:to-rose-500 transition-all duration-300">
                        <i class="bi bi-watch text-pink-500 group-hover:text-white"></i>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-pink-600 transition-colors">Fashion</span>
                </a>

            
                 <a href="/category/sports" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 flex items-center justify-center group-hover:from-green-500 group-hover:to-emerald-500 transition-all duration-300">
                        <i class="bi bi-trophy text-green-500 group-hover:text-white"></i>
                    </div>
                    <span class="font-medium text-gray-700 group-hover:text-green-600 transition-colors">sports</span>
                </a>

            </div>

            <div class="flex items-center  space-x-4">
                <p class="px-4 py-2 bg-gradient-to-r from-black-800 to-purple-800 text-white rounded-full text-sm font-semibold hover:shadow-lg transition-shadow">
                    <i class="bi bi-diamond mr-2"></i>
                    <b> Amethyst.pk</b>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Categories Menu -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">
    <div class="flex justify-around py-2">
        <a href="/" class="flex flex-col items-center p-2 text-purple-600">
            <i class="bi bi-house-door text-xl"></i>
            <span class="text-xs mt-1">Home</span>
        </a>
        <a href="/category" class="flex flex-col items-center p-2 text-gray-600 hover:text-purple-600">
            <i class="bi bi-grid text-xl"></i>
            <span class="text-xs mt-1">Categories</span>
        </a>
        <a href="/cart" class="flex flex-col items-center p-2 text-gray-600 hover:text-purple-600">
            <div class="relative">
                <i class="bi bi-cart3 text-xl"></i>
                <span class="absolute -top-2 -right-2 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">

                    {{-- By sir Hassan --}}

                      @if($cartCount > 0)
        <span class="absolute -top-2 -right-3 bg-red-600 text-white text-xs px-2 py-1 rounded-full">
            {{ $cartCount }}




        </span>
    @endif
                </span>
            </div>
            <span class="text-xs mt-1">Cart</span>
        </a>
        <a href="/profile" class="flex flex-col items-center p-2 text-gray-600 hover:text-purple-600">
            <i class="bi bi-person text-xl"></i>
            <span class="text-xs mt-1">Profile</span>
        </a>
    </div>
</div>

<!-- Styles -->
<style>
   
    /* Smooth transitions */
    * {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Gradient text animation */
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .gradient-text-animated {
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #f5576c);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: gradientShift 3s ease infinite;
    }
    
    /* Dropdown shadow */
    .dropdown-shadow {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    
    /* Glass effect */
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    /* Pulse animation for notifications */
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>

<!-- JavaScript -->
<script>
    // Mobile menu toggle
    document.querySelector('.lg\\:hidden button').addEventListener('click', function() {
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 lg:hidden';
        mobileMenu.innerHTML = `
            <div class="absolute left-0 top-0 h-full w-64 bg-white shadow-2xl">
                <div class="p-6 border-b">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold">Menu</h2>
                        <button class="text-2xl">&times;</button>
                    </div>
                </div>
                <div class="p-4">
                    <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-50">
                        <i class="bi bi-house-door"></i>
                        <span>Home</span>
                    </a>
                    <a href="/categories" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-50">
                        <i class="bi bi-grid"></i>
                        <span>All Categories</span>
                    </a>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-50">
                        <i class="bi bi-box-seam"></i>
                        <span>My Orders</span>
                    </a>
                    <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-50">
                        <i class="bi bi-heart"></i>
                        <span>Wishlist</span>
                    </a>
                    <a href="/notifications" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-50">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                </div>
            </div>
        `;
        
        document.body.appendChild(mobileMenu);
        
        // Close menu when clicking close button or overlay
        mobileMenu.querySelector('button').addEventListener('click', () => {
            document.body.removeChild(mobileMenu);
        });
        
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                document.body.removeChild(mobileMenu);
            }
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const searchButton = document.querySelector('button.bg-gradient-to-r');
    
    searchButton?.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query) {
            // Redirect to search page with query
            window.location.href = `/search?q=${encodeURIComponent(query)}`;
        }
    });
    
    searchInput?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const query = searchInput.value.trim();
            if (query) {
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        }
    });

    // Cart update animation
    const cartButton = document.querySelector('a[href="/cart"]');
    cartButton?.addEventListener('click', (e) => {
        // Add animation to cart icon
        const cartIcon = cartButton.querySelector('i');
        cartIcon.style.transform = 'scale(1.2)';
        setTimeout(() => {
            cartIcon.style.transform = 'scale(1)';
        }, 300);
    });

    // User dropdown hover effects
    const userDropdown = document.querySelector('.group.relative');
    userDropdown?.addEventListener('mouseenter', () => {
        const dropdown = userDropdown.querySelector('.absolute');
        if (dropdown) {
            dropdown.style.opacity = '1';
            dropdown.style.visibility = 'visible';
            dropdown.style.transform = 'translateY(0)';
        }
    });

    // Add shadow on scroll
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.sticky');
        if (window.scrollY > 10) {
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
        } else {
            navbar.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.05)';
        }
    });
</script>