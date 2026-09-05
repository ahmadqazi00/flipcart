<x-layout>
    <x-flash/>
    {{-- <x-user-nav/> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles for better UX */
        .cart-item-enter {
            opacity: 0;
            transform: translateY(-10px);
        }
        .cart-item-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 300ms, transform 300ms;
        }
        .cart-item-exit {
            opacity: 1;
        }
        .cart-item-exit-active {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 300ms, transform 300ms;
        }
        .quantity-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Main Wrapper -->
    <div class="min-h-screen">
        
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Your Store</h1>
                    <div class="flex items-center space-x-4">
                        <a href="/" class="text-gray-700 hover:text-blue-600 flex items-center">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="ml-1">Continue Shopping</span>
                        </a>
                        <div class="relative">
                            <i class="fas fa-shopping-cart text-xl cursor-pointer text-blue-600"></i>
                            <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main content -->
        <main class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Your Shopping Cart</h1>
            
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart items section -->
                <div class="lg:w-2/3">
                    <!-- Desktop cart header (hidden on mobile) -->
                    <div class="hidden md:grid grid-cols-12 gap-4 py-3 px-4 bg-gray-100 rounded-lg mb-4 font-semibold text-gray-700">
                        <div class="col-span-6">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-2 text-center">Quantity</div>
                        <div class="col-span-2 text-center">Total</div>
                    </div>

                    <!-- Cart items -->
                    <div class="space-y-4">
                        @foreach ($myCart as $item)
                        
                        <!-- Item Card -->
                        <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                            <div class="flex flex-col md:grid md:grid-cols-12 md:gap-4 items-start md:items-center">
                                <!-- Product info -->
                                <div class="col-span-6 flex items-start space-x-4 mb-4 md:mb-0">
                                    <div class="w-20 h-20 bg-gray-200 rounded-md overflow-hidden flex-shrink-0">
                                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $item['image']) }}" alt="">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $item['name'] }}</h3>
                                        <p class="text-gray-500 text-sm mt-1">{{ $item['product_description'] ?? '' }}</p>
                                        
                                        <!-- REMOVE FORM (Directly sends DELETE request to cart/id) -->
                                        <form action="/cart/{{ $item['id'] }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 text-sm mt-2 flex items-center hover:text-red-700">
                                                <i class="fas fa-trash-alt mr-1"></i> Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Price -->
                                <div class="col-span-2 mb-3 md:mb-0">
                                    <div class="md:hidden text-sm text-gray-500 font-medium">Price</div>
                                    <div class="text-gray-800 font-semibold text-lg md:text-center">{{ $item['price'] }}</div>
                                </div>
                                
                                <!-- Quantity -->
                                <div class="col-span-2 mb-3 md:mb-0">
                                    <div class="md:hidden text-sm text-gray-500 font-medium">Quantity</div>
                                    <div class="flex items-center justify-start md:justify-center">
                                        <button class="quantity-btn minus bg-gray-100 text-gray-700 w-8 h-8 rounded-l flex items-center justify-center hover:bg-gray-200">
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <div class="quantity-display bg-gray-50 w-10 h-8 flex items-center justify-center font-medium">1</div>
                                        <button class="quantity-btn plus bg-gray-100 text-gray-700 w-8 h-8 rounded-r flex items-center justify-center hover:bg-gray-200">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Total -->
                                <div class="col-span-2">
                                    <div class="md:hidden text-sm text-gray-500 font-medium">Total</div>
                                    <div class="text-gray-800 font-bold text-lg md:text-center item-total">{{ $item['price'] }}</div>
                                </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Cart actions -->
                    <div class="flex flex-col sm:flex-row justify-between items-center mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <i class="fas fa-tag text-blue-600 mr-2"></i>
                            <input type="text" placeholder="Discount code" class="px-4 py-2 border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-r hover:bg-gray-900 transition">Apply</button>
                        </div>
                        <button class="text-gray-700 hover:text-red-600 flex items-center update-cart">
                            <i class="fas fa-redo-alt mr-2"></i> Update Cart
                        </button>
                    </div>
                </div>
                
                <!-- Order summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Order Summary</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium" id="subtotal">$829.96</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium" id="shipping">$9.99</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200 flex justify-between">
                                <span class="text-lg font-bold text-gray-800">Total</span>
                                <span class="text-xl font-bold text-gray-800" id="total">$906.35</span>
                            </div>
                        </div>
                        
                        <!-- CHECKOUT FORM -->
                        <form action="/order" method="POST" class="mt-8">
                            @csrf
                            @foreach ($myCart as $item)
                                <input type="hidden" name="price[]" value="{{ $item['price'] }}">
                                <input type="hidden" name="image[]" value="{{ $item['image'] }}">
                                <input type="hidden" name="name[]" value="{{ $item['name'] }}">
                            @endforeach

                            <a href="/order" type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                                <i class="fas fa-lock mr-2"></i> Proceed to Checkout
                            </a>
                        </form>
                        
                        <div class="mt-6 text-center">
                            <p class="text-gray-500 text-sm">Free returns within 30 days</p>
                            <p class="text-gray-500 text-sm mt-1">Secure payment • SSL encrypted</p>
                        </div>
                        
                        <div class="mt-6 flex justify-center space-x-4">
                            <div class="w-10 h-6 bg-gray-200 rounded flex items-center justify-center text-xs font-bold">VISA</div>
                            <div class="w-10 h-6 bg-gray-200 rounded flex items-center justify-center text-xs font-bold">MC</div>
                            <div class="w-10 h-6 bg-gray-200 rounded flex items-center justify-center text-xs font-bold">AMEX</div>
                            <div class="w-10 h-6 bg-gray-200 rounded flex items-center justify-center text-xs font-bold">PP</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Empty cart message -->
        <div id="empty-cart" class="container mx-auto px-4 py-16 hidden">
            <div class="text-center">
                <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-6"></i>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">Your cart is empty</h2>
                <p class="text-gray-500 mb-8">Looks like you haven't added any items to your cart yet.</p>
                <a href="/" class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition inline-block">
                    Start Shopping
                </a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateCartTotals() {
            let subtotal = 0;
            let itemCount = 0;

            document.querySelectorAll('.bg-white.rounded-lg.shadow-sm.p-4').forEach(card => {
                const priceElement = card.querySelector('.text-lg');
                const quantityElement = card.querySelector('.quantity-display');
                const totalElement = card.querySelector('.item-total');

                if (priceElement && quantityElement && totalElement) {
                    const price = parseFloat(priceElement.textContent);
                    const quantity = parseInt(quantityElement.textContent);

                    const itemTotal = price * quantity;
                    totalElement.textContent = itemTotal.toFixed(2);

                    subtotal += itemTotal;
                    itemCount += quantity;
                }
            });

            const shipping = subtotal > 0 ? 200 : 0;
            const total = subtotal + shipping;

            const subtotalEl = document.getElementById('subtotal');
            const shippingEl = document.getElementById('shipping');
            const totalEl = document.getElementById('total');

            if (subtotalEl) subtotalEl.textContent = subtotal.toFixed(2);
            if (shippingEl) shippingEl.textContent = shipping.toFixed(2);
            if (totalEl) totalEl.textContent = total.toFixed(2);

            const cartBadge = document.querySelector('.relative span');
            if (cartBadge) cartBadge.textContent = itemCount;
        }

        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const display = this.parentElement.querySelector('.quantity-display');
                let quantity = parseInt(display.textContent);

                if (this.classList.contains('plus')) {
                    quantity++;
                } else if (this.classList.contains('minus') && quantity > 1) {
                    quantity--;
                }

                display.textContent = quantity;
                updateCartTotals();
            });
        });

        updateCartTotals();
    });
    </script>

</body>
</x-layout>