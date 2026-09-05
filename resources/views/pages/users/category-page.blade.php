<x-layout>
    <x-user-nav/>
    
<div class="min-h-screen bg-gray-50">
    <!-- Mobile Filter Header -->
    <div class="lg:hidden bg-white border-b px-4 py-3 flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-800">Products</h1>
        <button id="filterToggle" class="px-3 py-2 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">
            <i class="bi bi-funnel mr-1"></i> Filters
        </button>
    </div>

<div class="container mx-auto px-4 py-6">
<div class="grid grid-cols-12 gap-6">
    <!-- Filter Sidebar -->
    <div id="filterSidebar" class="xl:col-span-2 bg-white lg:col-span-3 md:col-span-4 col-span-12 shadow-lg rounded-xl p-5 lg:block hidden">
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <h4 class="font-bold text-lg text-gray-800">
                    Filters
                </h4>
                <button class="font-semibold text-blue-600 text-sm hover:text-blue-800">
                    Clear All
                </button>
            </div>
        </div>
        <hr class="border-gray-200 my-4">
        
        <h5 class="text-sm uppercase font-bold text-gray-700 mb-4">Categories</h5>
        <ul class="space-y-2">
            <a href="/category/sports" class="block">
                <li class="flex items-center p-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 cursor-pointer transition">
                    <i class="bi bi-chevron-right mr-2"></i>
                    Sports
                </li>
            </a>
            <a href="/category/electronics" class="block">
                <li class="flex items-center p-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 cursor-pointer transition">
                    <i class="bi bi-chevron-right mr-2"></i>
                    Electronics
                </li>
            </a> 
           <a href="/category/fashion" class="block"> 
                <li class="flex items-center p-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 cursor-pointer transition">
                    <i class="bi bi-chevron-right mr-2"></i>
                    Fashion
                </li>
            </a>
            <li class="flex items-center p-2 rounded-lg hover:bg-blue-50 hover:text-blue-600 cursor-pointer transition">
                <i class="bi bi-chevron-right mr-2"></i>
                Toys
            </li>
        </ul>
        
        <hr class="border-gray-200 my-6">
        <h3 class="text-sm capitalize font-bold text-gray-700 mb-4">Your reviews means us alot.</h3> 
        <h5 class="text-sm capitalize font-bold text-gray-700 mb-4">Thankyou.</h5>
        {{-- <h5 class="text-sm uppercase font-bold text-gray-700 mb-4">Price Range</h5>
        <input type="range" min="0" max="50000" value="25000" class="w-full h-2 bg-blue-100 rounded-lg" id="priceSlider"> --}}
        {{-- <div class="flex justify-between mt-2 text-sm text-gray-600">
            <span>Rs. 0</span>
            <span id="priceValue" class="font-semibold text-blue-600">Rs. 25,000</span>
            <span>Rs. 50,000</span>
        </div> --}}
        
        <!-- Mobile Apply Button -->
        <button id="applyFilters" class="w-full mt-6 py-3 bg-blue-600 text-white font-medium rounded-lg lg:hidden">
            Apply Filters
        </button>
    </div>

    <!-- Mobile Filter Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden lg:hidden">
        <div class="absolute right-0 top-0 h-full w-80 bg-white p-5 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h4 class="font-bold text-lg">Filters</h4>
                <button id="closeFilter" class="text-gray-500 hover:text-gray-800">
                    <i class="bi bi-x-lg text-xl"></i>
                </button>
            </div>
            <!-- Mobile filter content will be inserted here -->
        </div>
    </div>

    <!-- Products Section -->
    <div class="xl:col-span-10 bg-white lg:col-span-9 md:col-span-8 col-span-12 shadow-lg rounded-xl p-4 md:p-6">
        <!-- Desktop Header -->
        <div class="hidden md:flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">All Products</h2>
            <div class="text-gray-600">
                {{ count($releventProducts) }} products found
            </div>
        </div>

        <!-- Products Grid -->
        <div class="space-y-6">
            @foreach ($releventProducts as $item)
            <a href="/checkout/{{ $item['id'] }}" class="block group">
                <div class="grid grid-cols-12 gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-300">
                    <!-- Product Image -->
                    <div class="col-span-12 sm:col-span-3 md:col-span-2">
                        <div class="relative overflow-hidden rounded-lg bg-white p-2">
                            <img src="{{ asset('storage/' . $item['product_image']) }}"
                                 alt="{{ $item['product_name'] }}"
                                 class="w-full h-48 object-contain group-hover:scale-105 transition-transform duration-300">
                            <!-- Discount Badge -->
                            @if($item['compare_price'] > $item['main_price'])
                            <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ round(100 - ($item['main_price'] / $item['compare_price'] * 100)) }}% OFF
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="col-span-12 sm:col-span-7 md:col-span-7 lg:col-span-7">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            {{ $item['product_description'] }}
                        </h2>
                        
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                ⭐ 4.0
                            </div>
                            <span class="text-gray-500 text-sm">•</span>
                            <span class="text-gray-500 text-sm">Standard Delivery</span>
                        </div>
                        
                        <div class="text-gray-700 mb-3">
                            <span class="font-medium">{{ $item['product_name'] }}</span>
                        </div>
                        
                        <!-- Features -->
                        <div class="hidden sm:block">
                            <div class="flex flex-wrap gap-2">
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">1 Year Warranty</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">Cash on Delivery</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">7 Days Return</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price Section -->
                    <div class="col-span-12 sm:col-span-2 md:col-span-3 lg:col-span-3">
                        <div class="text-right">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                                Rs. {{ number_format($item['main_price']) }}
                            </h2>
                            @if($item['compare_price'] > $item['main_price'])
                            <p class="text-sm line-through text-gray-500 mt-1">
                                Rs. {{ number_format($item['compare_price']) }}
                            </p>
                            @endif
                            
                            <!-- Delivery Info -->
                            <div class="mt-4 text-sm text-gray-600">
                                <div class="flex items-center justify-end gap-1">
                                    <i class="bi bi-truck"></i>
                                    <span>Delivery: Rs. 150-300</span>
                                </div>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="mt-4 space-y-2">
                                <button class="w-full py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition text-sm">
                                    Buy Now
                                </button>
                                <button class="w-full py-2 border border-blue-600 text-blue-600 rounded-lg font-medium hover:bg-blue-50 transition text-sm">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            @if(count($releventProducts) === 0)
            <div class="text-center py-12">
                <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="bi bi-search text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No products found</h3>
                <p class="text-gray-500 mb-6">Try adjusting your filters</p>
                <button class="px-6 py-2 bg-blue-600 text-white rounded-lg font-medium">
                    Clear Filters
                </button>
            </div>
            @endif
        </div>
        
        <!-- Pagination -->
        @if(count($releventProducts) > 0)
        <div class="mt-8 flex justify-center">
            <div class="flex items-center gap-2">
                {{-- <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium">1</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i class="bi bi-chevron-right"></i>
                </button> --}}
            </div>
        </div>
        @endif
    </div>
</div>
</div>

<style>
    /* Custom styles */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    #priceSlider {
        -webkit-appearance: none;
        height: 6px;
        background: #dbeafe;
        border-radius: 5px;
    }
    
    #priceSlider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    #priceSlider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .grid > div {
            padding: 12px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Filter Toggle
        const filterToggle = document.getElementById('filterToggle');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeFilter = document.getElementById('closeFilter');
        const filterSidebar = document.querySelector('#filterSidebar');
        
        if (filterToggle) {
            filterToggle.addEventListener('click', function() {
                mobileOverlay.classList.remove('hidden');
                // Clone sidebar content to overlay
                const sidebarContent = filterSidebar.innerHTML;
                document.querySelector('#mobileOverlay .absolute > div').innerHTML += sidebarContent;
            });
        }
        
        if (closeFilter) {
            closeFilter.addEventListener('click', function() {
                mobileOverlay.classList.add('hidden');
            });
        }
        
        // Close overlay when clicking outside
        mobileOverlay.addEventListener('click', function(e) {
            if (e.target === mobileOverlay) {
                mobileOverlay.classList.add('hidden');
            }
        });
        
        // Price Slider
        const priceSlider = document.getElementById('priceSlider');
        const priceValue = document.getElementById('priceValue');
        
        if (priceSlider && priceValue) {
            priceSlider.addEventListener('input', function() {
                const value = parseInt(this.value).toLocaleString();
                priceValue.textContent = `Rs. ${value}`;
            });
        }
        
        // Apply Filters (Mobile)
        const applyFilters = document.getElementById('applyFilters');
        if (applyFilters) {
            applyFilters.addEventListener('click', function() {
                mobileOverlay.classList.add('hidden');
                alert('Filters applied!');
            });
        }
        
        // Add to Cart buttons
        document.querySelectorAll('button:contains("Add to Cart")').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Change button text briefly
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check2 mr-1"></i> Added';
                this.classList.remove('border-blue-600', 'text-blue-600');
                this.classList.add('bg-green-100', 'border-green-500', 'text-green-700');
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('bg-green-100', 'border-green-500', 'text-green-700');
                    this.classList.add('border-blue-600', 'text-blue-600');
                }, 2000);
            });
        });
        
        // Clear All Filters
        const clearAllBtn = document.querySelector('button:contains("Clear All")');
        if (clearAllBtn) {
            clearAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (priceSlider) priceSlider.value = 25000;
                if (priceValue) priceValue.textContent = 'Rs. 25,000';
                alert('All filters cleared!');
            });
        }
    });
</script>
</div>
</x-layout>