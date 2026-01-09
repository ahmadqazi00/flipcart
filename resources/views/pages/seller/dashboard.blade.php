<x-layout>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#10b981',
                        accent: '#8b5cf6'
                    }
                }
            }
        }
    </script>
    <style>
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .preview-image {
            transition: all 0.3s ease;
        }
        .preview-image:hover {
            transform: scale(1.05);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }


        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .main-content::-webkit-scrollbar{
            width: 0
        }
    </style>

<div class="bg-gradient-to-br from-gray-50 to-gray-100 flex min-h-screen">


    @if (session()->has('message'))

    {{-- <div class="fixed top-0 right-10 bg-red-500">
        <h1>Product added </h1>
    </div> --}}
         
    @endif


 
    <x-flash/>

    <x-seller-sidebar/>
    <div class="max-w-6xl main-content h-[90vh] overflow-y-scroll mx-auto">
        <!-- Header -->
        <header class="mb-8 text-center fade-in">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Add New Product</h1>
            <p class="text-gray-600 mt-2">Fill in the details below to add a new product to your catalog</p>
        </header>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left column: Form -->
            <div class="lg:w-2/3">
                <form id="productForm" action="/seller/add-product" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-xl p-6 md:p-8 fade-in" style="animation-delay: 0.1s">
                    @csrf
                    <!-- Basic Information Section -->
                    <section class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-info-circle text-primary mr-3"></i>
                            Basic Information
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Product Name -->
                            <div class="form-group">
                                <label for="productName" class="block text-sm font-medium text-gray-700 mb-2">
                                    Product Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="productName" name="product_name" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                           placeholder="Enter product name" value="{{ old('product_name') }}">
                                    @error('product_name')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <i class="fas fa-box text-gray-400"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Enter a descriptive name for your product</p>
                            </div>
                            
                            <!-- Product SKU -->
                            <div class="form-group">
                                <label for="productSku" class="block text-sm font-medium text-gray-700 mb-2">
                                    Product SKU <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="productSku" name="product_sku" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                           placeholder="E.g., PROD-12345">
                                            @error('product_sku')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <i class="fas fa-barcode text-gray-400"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Unique identifier for inventory tracking</p>
                            </div>
                        </div>
                        
                        <!-- Product Description -->
                        <div class="form-group mt-6">
                            <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-2">
                                Product Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="productDescription" name="product_description" rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                      placeholder="Describe your product features, benefits, and specifications..."></textarea>
                                       @error('product_description')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            <div class="flex justify-between mt-2">
                                <p class="text-xs text-gray-500">Provide a detailed description to help customers understand your product</p>
                                <span id="charCount" class="text-xs text-gray-500">0/500 characters</span>
                            </div>
                        </div>
                    </section>

                    <!-- Pricing & Inventory Section -->
                    <section class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-tag text-secondary mr-3"></i>
                            Pricing & Inventory
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Price -->
                            <div class="form-group">
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                    Price ($) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input type="number" id="price" name="main_price" step="0.01" min="0" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                           placeholder="0.00">
                                            @error('main_price')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Compare at Price -->
                            <div class="form-group">
                                <label for="comparePrice" class="block text-sm font-medium text-gray-700 mb-2">
                                    Compare at Price ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input type="number" id="comparePrice" name="compare_price" step="0.01" min="0"
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                           placeholder="0.00">
                                            @error('compare_price')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Original price to show a discount</p>
                            </div>
                            
                            <!-- Stock Quantity -->
                            <div class="form-group">
                                <label for="stockQuantity" class="block text-sm font-medium text-gray-700 mb-2">
                                    Stock Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="stockQuantity" name="stock" min="0" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200"
                                       placeholder="E.g., 100">
                                        @error('stock')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                    </section>

                    <!-- Product Images Section -->
                    <section class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-images text-accent mr-3"></i>
                            Product Images
                        </h2>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Product Images <span class="text-red-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center hover:border-primary transition duration-200"
                                 id="dropArea">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-700 font-medium">Drag & drop your images here</p>
                                <p class="text-gray-500 text-sm mt-2">or click to browse files</p>
                                <p class="text-gray-400 text-xs mt-2">Supports JPG, PNG, WEBP (Max 5MB each)</p>
                                <input type="file" id="imageUpload" name="product_image" 
                                       class="hidden">
                                        @error('product_image')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                        
                        <!-- Image Preview -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">
                                Image Preview
                            </label>
                            <div id="imagePreview" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                <!-- Preview images will appear here -->
                                <div class="border-2 border-dashed border-gray-200 rounded-xl h-32 flex flex-col items-center justify-center text-gray-400">
                                    <i class="fas fa-image text-xl mb-2"></i>
                                    <p class="text-xs">No images yet</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Category & Status Section -->
                    <section class="mb-10">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-tasks text-primary mr-3"></i>
                            Category & Status
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Category -->
                            <div class="form-group">
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <select id="category" name="category" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary form-input transition duration-200 appearance-none">
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="fashion">Fashion & Apparel</option>
                                    <option value="home">Home & Garden</option>
                                    <option value="sports">Sports & Outdoors</option>
                                    <option value="books">Books & Media</option>
                                    <option value="health">Health & Beauty</option>
                                    <option value="toys">Toys & Games</option>
                                    <option value="other">Other</option>
                                </select>
                                 @error('category')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 mt-12">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            
                            <!-- Product Status -->
                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Product Status
                                </label>
                                <div class="flex space-x-6 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" id="statusActive" name="status" value="1" checked
                                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                                @error('status')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                        <label for="statusActive" class="ml-2 text-gray-700">
                                            <span class="flex items-center">
                                                <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                                                Active
                                            </span>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="statusDraft" name="status" value="0"
                                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                        <label for="statusDraft" class="ml-2 text-gray-700">
                                            <span class="flex items-center">
                                                <span class="h-2 w-2 bg-gray-400 rounded-full mr-2"></span>
                                                Draft
                                            </span>
                                        </label>
                                         @error('status')
                                        <p class="text-red-500 font-semibold text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-between pt-6 border-t border-gray-200 gap-4">
                        <button type="button" id="resetBtn"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition duration-200 flex items-center justify-center">
                            <i class="fas fa-redo-alt mr-2"></i>
                            Reset Form
                        </button>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="button" id="saveDraftBtn"
                                    class="px-6 py-3 border border-primary text-primary rounded-lg font-medium hover:bg-blue-50 transition duration-200 flex items-center justify-center">
                                <i class="far fa-save mr-2"></i>
                                Save as Draft
                            </button>
                            
                            <button type="submit" id="submitBtn"
                                    class="px-8 py-3 bg-primary text-white rounded-lg font-medium hover:bg-blue-700 transition duration-200 flex items-center justify-center shadow-md hover:shadow-lg">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Add Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right column: Preview & Help -->
            <div class="lg:w-1/3">
                <!-- Product Preview Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 mb-6 fade-in" style="animation-delay: 0.2s">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-eye text-primary mr-3"></i>
                        Product Preview
                    </h2>
                    
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div id="previewImage" class="h-48 bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-image text-4xl text-gray-300"></i>
                        </div>
                        <div class="p-4">
                            <h3 id="previewName" class="font-medium text-gray-800 text-lg">Product Name</h3>
                            <p id="previewDescription" class="text-gray-600 text-sm mt-2 line-clamp-2">Product description will appear here...</p>
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <span id="previewPrice" class="text-2xl font-bold text-gray-800">$0.00</span>
                                    <span id="previewComparePrice" class="text-gray-500 line-through ml-2 hidden"></span>
                                </div>
                                <span id="previewStock" class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">In Stock: 0</span>
                            </div>
                            <div class="mt-4 flex items-center">
                                <i class="fas fa-tag text-gray-400 mr-2"></i>
                                <span id="previewCategory" class="text-gray-600 text-sm">Category: Not selected</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-medium text-blue-800 flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Tips for a great product listing:
                        </h4>
                        <ul class="text-sm text-blue-700 mt-2 space-y-1">
                            <li>• Use high-quality, well-lit images</li>
                            <li>• Write clear, descriptive titles</li>
                            <li>• Highlight unique selling points</li>
                            <li>• Set competitive pricing</li>
                            <li>• Keep inventory updated</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Form Progress -->
                <div class="bg-white rounded-2xl shadow-xl p-6 fade-in" style="animation-delay: 0.3s">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tasks text-secondary mr-3"></i>
                        Form Completion
                    </h2>
                    
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Progress</span>
                            <span id="progressPercent">0%</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div id="progressBar" class="h-full bg-primary rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div id="basicInfoCheck" class="h-5 w-5 rounded-full border-2 border-gray-300 mr-3 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Basic Information</span>
                        </div>
                        <div class="flex items-center">
                            <div id="pricingCheck" class="h-5 w-5 rounded-full border-2 border-gray-300 mr-3 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Pricing & Inventory</span>
                        </div>
                        <div class="flex items-center">
                            <div id="imagesCheck" class="h-5 w-5 rounded-full border-2 border-gray-300 mr-3 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Product Images</span>
                        </div>
                        <div class="flex items-center">
                            <div id="categoryCheck" class="h-5 w-5 rounded-full border-2 border-gray-300 mr-3 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Category & Status</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toast Notification -->
        <div id="toast" class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-4 rounded-lg shadow-xl transform translate-y-full transition-transform duration-300 z-50 max-w-sm">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-xl mr-3"></i>
                <div>
                    <p class="font-medium">Product Added Successfully!</p>
                    <p class="text-sm opacity-90 mt-1">Your product has been added to the catalog.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const productForm = document.getElementById('productForm');
        const resetBtn = document.getElementById('resetBtn');
        const saveDraftBtn = document.getElementById('saveDraftBtn');
        const submitBtn = document.getElementById('submitBtn');
        const imageUpload = document.getElementById('imageUpload');
        const dropArea = document.getElementById('dropArea');
        const imagePreview = document.getElementById('imagePreview');
        const charCount = document.getElementById('charCount');
        const descriptionField = document.getElementById('productDescription');
        const toast = document.getElementById('toast');
        
        // Preview elements
        const previewName = document.getElementById('previewName');
        const previewDescription = document.getElementById('previewDescription');
        const previewPrice = document.getElementById('previewPrice');
        const previewComparePrice = document.getElementById('previewComparePrice');
        const previewStock = document.getElementById('previewStock');
        const previewCategory = document.getElementById('previewCategory');
        const previewImage = document.getElementById('previewImage');
        
        // Progress check elements
        const basicInfoCheck = document.getElementById('basicInfoCheck');
        const pricingCheck = document.getElementById('pricingCheck');
        const imagesCheck = document.getElementById('imagesCheck');
        const categoryCheck = document.getElementById('categoryCheck');
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        
        // Store uploaded images
        let uploadedImages = [];
        
        // Initialize character counter
        descriptionField.addEventListener('input', updateCharCount);
        
        function updateCharCount() {
            const count = descriptionField.value.length;
            charCount.textContent = `${count}/500 characters`;
            
            if (count > 450) {
                charCount.classList.add('text-red-500');
                charCount.classList.remove('text-gray-500');
            } else {
                charCount.classList.remove('text-red-500');
                charCount.classList.add('text-gray-500');
            }
            
            // Update preview
            previewDescription.textContent = descriptionField.value || "Product description will appear here...";
            updateProgress();
        }
        
        // Update live preview when form changes
        // productForm.addEventListener('input', function(e) {
        //     const target = e.target;
            
        //     if (target.id === 'productName') {
        //         previewName.textContent = target.value || "Product Name";
        //     } else if (target.id === 'price') {
        //         previewPrice.textContent = `$${target.value || "0.00"}`;
        //     } else if (target.id === 'comparePrice') {
        //         if (target.value && parseFloat(target.value) > 0) {
        //             previewComparePrice.textContent = `$${target.value}`;
        //             previewComparePrice.classList.remove('hidden');
        //         } else {
        //             previewComparePrice.classList.add('hidden');
        //         }
        //     } else if (target.id === 'stockQuantity') {
        //         const stock = parseInt(target.value) || 0;
        //         previewStock.textContent = stock > 0 ? `In Stock: ${stock}` : "Out of Stock";
        //         previewStock.className = stock > 0 ? 
        //             "px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full" : 
        //             "px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full";
        //     } else if (target.id === 'category') {
        //         const categoryText = target.options[target.selectedIndex].text;
        //         previewCategory.textContent = `Category: ${categoryText}`;
        //     }
            
        //     updateProgress();
        // });
        
        // Update progress bar and checkmarks
        function updateProgress() {
            let progress = 0;
            let completedSections = 0;
            
            // Basic Info (25%)
            const name = document.getElementById('productName').value;
            const sku = document.getElementById('productSku').value;
            const desc = document.getElementById('productDescription').value;
            
            if (name && sku && desc) {
                progress += 25;
                completedSections++;
                basicInfoCheck.classList.add('bg-green-500', 'border-green-500');
            } else {
                basicInfoCheck.classList.remove('bg-green-500', 'border-green-500');
            }
            
            // Pricing & Inventory (25%)
            const price = document.getElementById('price').value;
            const stock = document.getElementById('stockQuantity').value;
            
            if (price && stock) {
                progress += 25;
                completedSections++;
                pricingCheck.classList.add('bg-green-500', 'border-green-500');
            } else {
                pricingCheck.classList.remove('bg-green-500', 'border-green-500');
            }
            
            // Product Images (25%)
            if (uploadedImages.length > 0) {
                progress += 25;
                completedSections++;
                imagesCheck.classList.add('bg-green-500', 'border-green-500');
            } else {
                imagesCheck.classList.remove('bg-green-500', 'border-green-500');
            }
            
            // Category & Status (25%)
            const category = document.getElementById('category').value;
            
            if (category) {
                progress += 25;
                completedSections++;
                categoryCheck.classList.add('bg-green-500', 'border-green-500');
            } else {
                categoryCheck.classList.remove('bg-green-500', 'border-green-500');
            }
            
            // Update progress bar
            progressBar.style.width = `${progress}%`;
            progressPercent.textContent = `${progress}%`;
        }
        
        // Image upload handling
        dropArea.addEventListener('click', () => imageUpload.click());
        
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('border-primary', 'bg-blue-50');
        });
        
        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-primary', 'bg-blue-50');
        });
        
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('border-primary', 'bg-blue-50');
            
            if (e.dataTransfer.files.length) {
                imageUpload.files = e.dataTransfer.files;
                handleImageUpload();
            }
        });
        
        imageUpload.addEventListener('change', handleImageUpload);
        
        function handleImageUpload() {
            const files = imageUpload.files;
            
            if (!files.length) return;
            
            // Clear previous placeholder
            if (uploadedImages.length === 0) {
                imagePreview.innerHTML = '';
            }
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // Check file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert(`File "${file.name}" is too large. Max size is 5MB.`);
                    continue;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const imageUrl = e.target.result;
                    uploadedImages.push(imageUrl);
                    
                    // Create image preview element
                    const previewItem = document.createElement('div');
                    previewItem.className = 'relative group rounded-xl overflow-hidden preview-image';
                    
                    previewItem.innerHTML = `
                        <img src="${imageUrl}" alt="Preview" class="h-32 w-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition duration-200 flex items-center justify-center">
                            <button type="button" class="delete-image-btn opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition duration-200 bg-red-500 text-white p-2 rounded-full">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </div>
                    `;
                    
                    imagePreview.appendChild(previewItem);
                    
                    // Update main preview with first image
                    if (uploadedImages.length === 1) {
                        previewImage.innerHTML = `<img src="${imageUrl}" alt="Product" class="h-full w-full object-cover">`;
                    }
                    
                    // Add delete functionality
                    const deleteBtn = previewItem.querySelector('.delete-image-btn');
                    deleteBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const index = uploadedImages.indexOf(imageUrl);
                        if (index > -1) {
                            uploadedImages.splice(index, 1);
                        }
                        previewItem.remove();
                        
                        // Update main preview if we deleted the first image
                        if (uploadedImages.length > 0) {
                            previewImage.innerHTML = `<img src="${uploadedImages[0]}" alt="Product" class="h-full w-full object-cover">`;
                        } else {
                            previewImage.innerHTML = '<i class="fas fa-image text-4xl text-gray-300"></i>';
                            // Add placeholder back
                            imagePreview.innerHTML = `
                                <div class="border-2 border-dashed border-gray-200 rounded-xl h-32 flex flex-col items-center justify-center text-gray-400">
                                    <i class="fas fa-image text-xl mb-2"></i>
                                    <p class="text-xs">No images yet</p>
                                </div>
                            `;
                        }
                        
                        updateProgress();
                    });
                    
                    updateProgress();
                };
                
                reader.readAsDataURL(file);
            }
            
            // Reset file input
            // imageUpload.value = '';
        }
        
        // Form submission
        // productForm.addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     // Validate  fields
        //     const Fields = productForm.querySelectorAll('[]');
        //     let isValid = true;
            
        //     Fields.forEach(field => {
        //         if (!field.value.trim()) {
        //             isValid = false;
        //             field.classList.add('border-red-500');
        //             field.addEventListener('input', function() {
        //                 this.classList.remove('border-red-500');
        //             }, { once: true });
        //         }
        //     });
            
        //     if (!isValid) {
        //         alert('Please fill in all  fields.');
        //         return;
        //     }
            
        //     if (uploadedImages.length === 0) {
        //         alert('Please upload at least one product image.');
        //         return;
        //     }
            
        //     // Simulate form submission
        //     submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Adding Product...';
        //     submitBtn.disabled = true;
            
        //     setTimeout(() => {
        //         // Show success toast
        //         toast.classList.remove('translate-y-full');
                
        //         // Reset form after success
        //         setTimeout(() => {
        //             toast.classList.add('translate-y-full');
        //             resetForm();
        //             submitBtn.innerHTML = '<i class="fas fa-plus-circle mr-2"></i> Add Product';
        //             submitBtn.disabled = false;
        //         }, 3000);
        //     }, 1500);
        // });
        
        // Save as draft button
        saveDraftBtn.addEventListener('click', function() {
            // Save form data to localStorage (simulated)
            const formData = new FormData(productForm);
            const data = Object.fromEntries(formData);
            data.images = uploadedImages;
            
            localStorage.setItem('productDraft', JSON.stringify(data));
            
            // Show temporary feedback
            const originalText = saveDraftBtn.innerHTML;
            saveDraftBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Draft Saved!';
            saveDraftBtn.classList.remove('border-primary', 'text-primary');
            saveDraftBtn.classList.add('border-green-500', 'text-green-600', 'bg-green-50');
            
            setTimeout(() => {
                saveDraftBtn.innerHTML = originalText;
                saveDraftBtn.classList.remove('border-green-500', 'text-green-600', 'bg-green-50');
                saveDraftBtn.classList.add('border-primary', 'text-primary');
            }, 2000);
        });
        
        // Reset form
        resetBtn.addEventListener('click', resetForm);
        
        function resetForm() {
            if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
                productForm.reset();
                uploadedImages = [];
                imagePreview.innerHTML = `
                    <div class="border-2 border-dashed border-gray-200 rounded-xl h-32 flex flex-col items-center justify-center text-gray-400">
                        <i class="fas fa-image text-xl mb-2"></i>
                        <p class="text-xs">No images yet</p>
                    </div>
                `;
                
                // Reset preview
                previewName.textContent = "Product Name";
                previewDescription.textContent = "Product description will appear here...";
                previewPrice.textContent = "$0.00";
                previewComparePrice.classList.add('hidden');
                previewStock.textContent = "In Stock: 0";
                previewStock.className = "px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full";
                previewCategory.textContent = "Category: Not selected";
                previewImage.innerHTML = '<i class="fas fa-image text-4xl text-gray-300"></i>';
                
                // Reset progress
                progressBar.style.width = '0%';
                progressPercent.textContent = '0%';
                
                // Reset checkmarks
                [basicInfoCheck, pricingCheck, imagesCheck, categoryCheck].forEach(check => {
                    check.classList.remove('bg-green-500', 'border-green-500');
                });
                
                updateCharCount();
            }
        }
        
        // Initialize
        updateCharCount();
        updateProgress();
    </script>
</x-layout>