<x-layout>
    
 {{-- <x-seller-sidebar/> --}}
 {{-- // meine yahan form ko line 49 se utha kr yahan rakh diya take pura page backend me jaye.. --}}
 <form action="/add-shipping" method="POST" class="space-y-4">
      @csrf
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <div class="bg-white w-full max-w-2xl rounded-xl shadow-lg p-6">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
      Shipping Details
    </h2>
    

{{-- start --}}

    <!-- Product Summary -->
<div class="mb-6 border rounded-lg p-4 bg-gray-50">

  <h3 class="text-lg font-semibold mb-4 text-gray-700">
    Product Details

  </h3>

  <!-- Row -->
  <div class="flex items-center gap-4 border-b pb-4">
    
    <!-- Product Info -->
    <div class="flex-1">
      <h4 class="font-semibold text-gray-800">
       
      </h4>

      <p class="text-gray-600">
      
      </p>
    </div>

  </div>

</div>

{{-- end 16feb --}}

{{-- 
    <form action="/add-shipping" method="POST" class="space-y-4">
      @csrf --}}
      <!-- Name -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" name="first_name" placeholder="First Name"
          class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <input type="text" name="last_name" placeholder="Last Name"
          class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <!-- Phone -->
      <input type="tel" name="phone" placeholder="Phone Number (03XX-XXXXXXX)"
        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
        pattern="03[0-9]{9}" required>

      <!-- City -->
      <select name="city"
        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <option value="">Select City</option>
        <option>Karachi</option>
        <option>Lahore</option>
        <option>Islamabad</option>
        <option>Rawalpindi</option>
        <option>Faisalabad</option>
        <option>Multan</option>
        <option>Peshawar</option>
        <option>Quetta</option>
      </select>

      <!-- House -->
      <input type="text" name="house_no" placeholder="House / Flat Number"
        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>

      <!-- Address -->
      <textarea name="address" rows="3" placeholder="Complete Address (Street, Area, Landmark)"
        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>

      <!-- Shipping Method -->
      <div>
        <h3 class="font-semibold text-gray-700 mb-2">Shipping Method</h3>

        <label class="flex items-center gap-2 mb-2">
          <input type="radio" name="shipping_method" value="standard" checked>
          <span>Standard Delivery (2–3 Days) – Rs.  (250-300)/-</span>
        </label>

        {{-- <label class="flex items-center gap-2">
          <input type="radio" name="shipping_method" value="express">
          <span>Express Delivery (1–2 Days) – Rs. 400</span>
        </label> --}}
      </div>

      <!-- Submit -->
      <button
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
        Place Order
      </button>

    </form>
  </div>

</body>
</x-layout>