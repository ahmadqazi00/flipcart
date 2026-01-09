<x-layout>
<x-user-nav/>    
   
<div class="container border border-gray-400 0-10  border-gray-500 mx-auto flex gap-3 items-start">
    <div class="w-1/3 px-3">
        <img src="{{ asset('storage/' . $singleProduct['product_image']) }}"class="w-full" alt="">
    <div class="flex gap-3 my-4">
        <button class="bg-orange-600 w-full text-white py-5">
        Add To Cart
    </button>
            <button class="bg-blue-600 w-full text-white py-5">
        Buy Now
    </button>
    </div>
    </div>


   <div class="">
     {{-- discription --}}
    <h1 class="text-xl">
        {{ $singleProduct['product_name'] }}
    </h1>

    <h4 class="text-green-500">
        Special Price 
    </h4>

    <div class="flex gap-3">

     <h4 class="text-red-800 text-2xl">
         Rs.{{ $singleProduct['main_price'] }}/-
    </h4>

    <h4 class="text-gray-500 line-through self-end">
         Rs.{{ $singleProduct['compare_price'] }}/- 
    </h4>

   </div>
   <h4 class="text-gray-500 py-3 self-end">
         {{ $singleProduct['product_description'] }}
    </h4>

</div>

</div>


</x-layout>