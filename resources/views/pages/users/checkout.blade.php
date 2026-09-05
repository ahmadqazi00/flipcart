<x-layout>
<x-user-nav/>

{{-- Display message --}}
@if(session('message'))
    <div class="bg-green-200 text-green-800 px-4 py-2 my-2 rounded max-w-7xl mx-4 md:mx-auto">
        {{ session('message') }}
    </div>
@endif

<div class="container mx-auto px-4 py-8 max-w-7xl">
    <form action="/shop" method="POST" class="flex flex-col lg:flex-row gap-6 lg:gap-8 bg-white p-4 md:p-6 rounded-lg shadow-md">
        @csrf

        <div class="lg:w-1/2 xl:w-2/5">
            <!-- Product Image -->
            <div class="mb-4 md:mb-6">
                <div class="bg-gray-50 rounded-lg p-4 md:p-8 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $singleProduct['product_image']) }}" 
                         class="w-full max-w-md object-contain" 
                         alt="{{ $singleProduct['product_name'] }}">
                </div>
            </div>

            <!-- Hidden Inputs -->
            <input type="hidden" name="image" value="{{ $singleProduct['product_image'] }}">
            <input type="hidden" name="name" value="{{ $singleProduct['product_name'] }}">
            <input type="hidden" name="price" value="{{ $singleProduct['main_price'] }}">

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 my-4 md:my-6">
                <button type="submit" class="bg-orange-600 w-full text-white py-4 md:py-5 rounded-lg hover:bg-orange-700 transition-colors text-sm md:text-base font-medium">
                    Add To Cart
                </button>
                  
                <a href="/order" type="button" class="bg-blue-600 block w-full text-center text-white py-4 md:py-5 rounded-lg hover:bg-blue-700 transition-colors text-sm md:text-base font-medium"> 
                    Buy Now
                </a>
            
            </div>
        </div>

        <div class="lg:w-1/2 xl:w-3/5">
            <!-- Product Info -->
            <div class="space-y-4 md:space-y-6">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">
                    {{ $singleProduct['product_name'] }}
                </h1>
                
                <!-- Price Section -->
                <div class="space-y-2">
                    <div class="flex items-baseline gap-3">
                        <h4 class="text-3xl md:text-4xl font-bold text-red-800">
                            Rs.{{ number_format($singleProduct['main_price']) }}/-
                        </h4>
                        @if($singleProduct['compare_price'] > $singleProduct['main_price'])
                        <h4 class="text-lg md:text-xl text-gray-500 line-through">
                            Rs.{{ number_format($singleProduct['compare_price']) }}/-
                        </h4>
                        @endif
                    </div>
                    
                    <!-- Discount Badge -->
                    @if($singleProduct['compare_price'] > $singleProduct['main_price'])
                    <span class="inline-block bg-red-100 text-red-800 text-sm font-semibold px-3 py-1 rounded-full">
                        Save Rs.{{ number_format($singleProduct['compare_price'] - $singleProduct['main_price']) }}
                    </span>
                    @endif
                </div>

                <!-- Description -->
                <div class="pt-4 border-t border-gray-200">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-3">Description</h3>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                        {{ $singleProduct['product_description'] }}
                    </p>
                </div>

                
                <!-- Additional Features -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4 border-t border-gray-200">
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm md:text-base">Standard Delivery</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm md:text-base">Cash on Delivery</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm md:text-base">7-Day Returns</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm md:text-base">1 Year Warranty</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Simple JavaScript for Buy Now Button -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find Buy Now button
        const buyNowBtn = document.querySelector('button[type="button"]');
        
        if (buyNowBtn) {
            buyNowBtn.addEventListener('click', function() {
                // Get the form
                const form = this.closest('form');
                
                // Change form action to checkout (assuming /checkout route exists)
                form.action = '/checkout';
                
                // Submit the form
                form.submit();
                
                // Reset form action after submission attempt
                setTimeout(() => {
                    form.action = '/shop';
                }, 100);
            });
        }
        
        // Add some visual feedback for Add to Cart button
        const addToCartBtn = document.querySelector('button[type="submit"]');
        
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function() {
                // Optional: Add loading effect
                const originalText = this.textContent;
                this.textContent = 'Adding...';
                this.disabled = true;
                
                // Revert after 2 seconds if form doesn't submit
                setTimeout(() => {
                    if (this.disabled) {
                        this.textContent = originalText;
                        this.disabled = false;
                    }
                }, 2000);
            });
        }
    });
</script>

<!-- Simple CSS for responsiveness -->
<style>
    /* Ensure images don't overflow on mobile */
    img {
        max-width: 100%;
        height: auto;
    }
    
    /* Smooth transitions for buttons */
    button {
        transition: background-color 0.2s ease;
    }
    
    /* Improve touch targets on mobile */
    @media (max-width: 640px) {
        button {
            min-height: 44px;
        }
    }
</style>
</x-layout>