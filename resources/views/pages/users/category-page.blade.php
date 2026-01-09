<x-layout>
    <x-user-nav/>
<div class="min-h-screen bg-gray-100">
<div class="grid grid-cols-12">
    <div class="xl:col-span-2 bg-white  lg:col-span-3 md:col-span-4 shadow-xl p-4">
        <div class="bg-white">
            <div class="flex justify-between">
                <h4 class="font-semibold">
                    Filters
                </h4>
                <h5 class="font-semibold text-blue-500 text-sm">
                    Clear All
                </h5>
            </div>
        </div>
        <hr class="border-gray-200 my-2">
        <h5 class="text-sm uppercase font-semobold">categories</h5>
        <ul class="unstyled font-semibold my-5 text-gray-500">
            <li><i class="bi bi-chevron-left"></i>
            Computers</li>

             <li><i class="bi bi-chevron-left"></i>
            Computers Components</li>
        </ul>
        <hr class="border-gray-200 my-2">
        <input type="range" name="" class="w-full" id="">

    </div>
    <div class="xl:col-span-10 bg-white h-[80vh] overflow-y-scroll lg:col-span-9 md:col-span-8 shadow-xl p-4">
      

    @foreach ($releventProducts as $item)
     <a href="/checkout/{{ $item['id'] }}" class="grid grid-cols-12 gap-3">
            <div class="col-span-2">
            <img src="{{ asset('storage/' . $item['product_image']) }}"
            width="100%" alt="">
            </div>
           <div class="col-span-7 flex flex-col gap-2 px-5">
             <h2>
               {{ $item['product_description'] }}

             </h2>
             <div class="flex gap-3 items-center">
                <div class="bg-green-600 px-4 text-sm rounded-sm text-white">
                ⭐ 4.0
                </div>
             </div>
             <ul class="text-sm list-disc text-gray-700">
                <li>
                    {{ $item['product_name'] }}
                </li>
               
             </ul>
           </div>
           <div class="col-span-3">

             <h2 class="text-2xl font-semibold">
               Rs. {{ $item['main_price'] }}/-
             </h2>
             <p class="text-sm line-through text-gray-700">
              Rs.  {{ $item['compare_price'] }}/-
             </p>
           
        </div>
        <hr class="border-gray-900">
        
    </a>
    @endforeach
</div>
</div>
</div>
</x-layout>