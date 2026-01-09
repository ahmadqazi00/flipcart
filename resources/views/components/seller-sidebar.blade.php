{{-- @php
    $sidebarData = [
        "dashboard"=>
    ]
@endphp --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        * {
            font-family: 'Inter', sans-serif;
        }
        .d-flex {
            display: flex;
        }
        .m-full {
            width: 100%;
        }
        .sidebar-item {
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
            padding-left: 28px;
        }
        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.2);
            border-left: 4px solid #3b82f6;
        }
        .icon-wrapper {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
        }
        .notification-badge {
            margin-left: auto;
            background-color: #ef4444;
            color: white;
            font-size: 12px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<div class="bg-gray-900  top-0 flex">
    <!-- Sidebar -->
    <ul class="min-h-screen text-white divide-y divide-gray-700 xl:w-[20%] lg:w-[30%] md:w-[35%] bg-gray-800 shadow-2xl">
        <!-- Brand Header -->
        <li class="p-6">
            <div class="d-flex gap-3 items-center">
                <div class="icon-wrapper bg-blue-600">
                    <i class="bi bi-shop text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Seller's</h3>
                    <p class="text-gray-400 text-sm">Dashboard </p>
                </div>
            </div>
        </li>
        
        <!-- Dashboard -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center active">
            <div class="icon-wrapper bg-blue-900/30">
                <i class="bi bi-speedometer2 text-blue-400"></i>
            </div>
            <h4 class="font-medium">Dashboard</h4>
        </li>
        
        <!-- Products -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-green-900/30">
                <i class="bi bi-box-seam text-green-400"></i>
            </div>
            <h4 class="font-medium">Products</h4>
            <div class="notification-badge">12</div>
        </li>
        
        <!-- Orders -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-purple-900/30">
                <i class="bi bi-cart-check text-purple-400"></i>
            </div>
            <h4 class="font-medium">Orders</h4>
            <div class="notification-badge">5</div>
        </li>
        
        <!-- Customers -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-yellow-900/30">
                <i class="bi bi-people text-yellow-400"></i>
            </div>
            <h4 class="font-medium">Customers</h4>
        </li>
        
        <!-- Coupons -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-pink-900/30">
                <i class="bi bi-tag text-pink-400"></i>
            </div>
            <h4 class="font-medium">Coupons</h4>
            <div class="notification-badge">3</div>
        </li>
        
        <!-- Reports -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-teal-900/30">
                <i class="bi bi-bar-chart text-teal-400"></i>
            </div>
            <h4 class="font-medium">Reports</h4>
        </li>
        
        <!-- Reviews -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-indigo-900/30">
                <i class="bi bi-chat-left-text text-indigo-400"></i>
            </div>
            <h4 class="font-medium">Reviews</h4>
            <div class="notification-badge">8</div>
        </li>
        
        <!-- Withdraw -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-orange-900/30">
                <i class="bi bi-wallet2 text-orange-400"></i>
            </div>
            <h4 class="font-medium">Withdraw</h4>
        </li>
        
        <!-- Settings -->
        <li class="sidebar-item d-flex gap-3 p-4 items-center">
            <div class="icon-wrapper bg-gray-700">
                <i class="bi bi-gear text-gray-300"></i>
            </div>
            <h4 class="font-medium">Settings</h4>
        </li>
        
        <!-- Divider -->
        <li class="p-6">
            <div class="h-px bg-gray-700"></div>
        </li>
        
    </ul>

    <!-- Main Content Area -->
    <div class="flex-1 p-8">
        <div class="mb-8">
        </div>
    </div>

    <script>
        // Add hover effects and active state toggling
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all items
                document.querySelectorAll('.sidebar-item').forEach(i => {
                    i.classList.remove('active');
                });
                // Add active class to clicked item
                this.classList.add('active');
            });
        });
    </script>
