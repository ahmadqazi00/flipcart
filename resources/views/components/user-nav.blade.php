<div class="flex items-center justify-center justify-around p-6 ">
    <i class="bi bi-list block sm:hidden"></i>
    <img src="/logo.svg" alt="">
    <div class="sm:flex gap-3  w-1/2 p-2 rounded-md items-center px-5 bg-gray-100">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search for Products, Brands and More" class="outline-0">
    </div>

    <div class="flex p-2 items-center hover:bg-blue-500 hover:text-white group relative gap-2 text-gray-800">
        <i class="bi bi-person-circle"></i>
       @auth
        <h3 class="text-lg">
            {{ auth()->user()->name }}
        </h3>
        <form action="/logout" method="POST">
            @csrf
        <button class="text-red-600 font-semibold">
            Logout
        </button>
        </form>
       @endauth

       @guest
        <a href="/login" class="">login
        </a>
       @endguest
        <i class="bi bi-chevron-down text-sm"></i>
        
        {{-- w-[250] has been removed --}}
        <div class="absolute group-hover:block hidden top-11 rounded-xl p-4 bg-white shadow-xl"> 
        <div class="flex justify-between items-center">
            <h3 class="text-gray-800 font-semibold">New Customer ?</h3>
            <a href="" class="text-blue-500 font-semibold">
                Sign Up
            </a>
        </div>
        <hr class="my-1 border-gray-300">
        <ul class="w-64 bg-white  rounded-lg text-sm shadow-lg py-2 text-gray-800">
    
    <li class="flex items-center  gap-3 px-4 py-3  hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-person text-lg"></i>
        <span>My Profile</span>
    </li>

    <li class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-stars text-lg"></i>
        <span>Flipkart Plus Zone</span>
    </li>

    <li class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-box-seam text-lg"></i>
        <span>Orders</span>
    </li>

    <li class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-heart text-lg"></i>
        <span>Wishlist</span>
    </li>

    <li class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-gift text-lg"></i>
        <span>Rewards</span>
    </li>

    <li class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 cursor-pointer">
        <i class="bi bi-credit-card text-lg"></i>
        <span>Gift Cards</span>
    </li>

</ul>

        </div>




    </div>

     <div class="flex items-center p-2 rounded-md gap-2 text-gray-800">
        <i class="bi bi-cart"></i>
        <h3 class="hiddden xl:block">Cart</h3>
    </div>

    <div class="flex items-center p-2 rounded-md gap-2 text-gray-800">
        <i class="bi bi-shop"></i>
        <h3 class="hiddden xl:block">Become a Seller</h3>
        <i class="bi bi-three-dots-vertical"></i>
      
    </div>

</div>