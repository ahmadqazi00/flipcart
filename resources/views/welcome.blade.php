<x-layout>

    <style>
.product-scroll::-webkit-scrollbar{
    height: 0;
    width: 0;
}

    </style>


    <x-user-nav />
    <div class="container  mx-auto my-10 ">
    <img src="https://rukminim2.flixcart.com/fk-p-flap/3240/540/image/1338bd4fc60390d8.jpg?q=60" 
    width="100%" alt="">
    
    @if (count($products) > 0)
    <div class="grid my-10 grid-cols-12">
    
        <div class="col-span-10 relative p-2 shadow-xl">
        <h3 class="text-xl">Top Deals</h3>

                             {{-- working div --}}

        <div class="h-8 absolute right-arrow right-0  w-8 flex z-10 
         justify-center items-center bg-cyan-800 
        shadow-xl top-1/2 -translate-y-1/2 rounded-full">
         <i class="bi  bi-chevron-right"></i>
        </div>

        <div class="h-8 absolute left-arrow left-0  w-8 flex z-10 
         justify-center items-center bg-cyan-800 
        shadow-xl top-1/2 -translate-y-1/2 rounded-full">
         <i class="bi  bi-chevron-left"></i>
        </div>
        

        <div class="flex gap-3 product-scroll relative overflow-x-scroll w-full">
        @foreach ($products as $item)
            <a
             href="/category/{{ $item['category'] }}" class="p-3 shadow text-center h-[250px] shrink-0 w-[200px]">
                <img src="{{ asset('storage/' . $item['product_image']) }}"  class="object-cover" 
                h-[70px] w-[90px] alt="">

                <h5 class="py-1">{{ $item['product_name'] }}</h5> 
                <h4 class="font-semibold">
                         From Rs. {{ $item['main_price'] }}
                 </h4>


            </a>
        @endforeach
     </div>
       </div>
    <div class="col-span-2"></div>
   
     </div>
        
    @else
      <h4 class="text-xl my-10 text-center text-orrange-700">
    No Active Deals    
    </h4>  
    @endif








<script>
 let right = document.querySelector('.right-arrow')
 let left = document.querySelector('.left-arrow')
 let prod_scroll = document.querySelector('.product-scroll')

 right.addEventListener('click',()=>{
 prod_scroll.scrollBy({
    left:100,
    behavior:"smooth"
 })

 })

left.addEventListener('click',()=>{
 prod_scroll.scrollBy({
    left:-100,
    behavior:"smooth"
 })

})
 
</script>

</x-layout>