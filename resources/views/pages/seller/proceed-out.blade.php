<x-layout>

    <div class="max-w-6xl mx-auto px-4 py-6">


        <!-- Page Heading -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-2xl font-bold">📦 Orders</h1>
        </div>

        <!-- FORM START -->
        <form method="POST" action="/order-action">
            @csrf

            <!-- Desktop Table -->
            <div class="hidden md:block bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 text-sm text-gray-600">
                        <tr>
                            <th class="p-3">Order ID</th>
                            <th class="p-3">Customer</th>
                            <th class="p-3">Amount</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Date</th>
                            <th class="p-3 text-center">Action</th>
                             <th class="p-3 ">City</th>
                             <th class="p-3 ">House No</th>
                             <th class="p-3 ">Address</th>
                             
                        </tr>
                    </thead>

                    <tbody>
                        
                            <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">#1023</td>
                            <td class="p-3">Ahmed Ali</td>
                            <td class="p-3 font-medium">Rs 4,500</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            </td>
                            <td class="p-3">05 Feb 2026</td>
                            <td class="p-3 text-center space-x-2">

                                <!-- Dispatch -->
                                <button value 
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Dispatch
                                </button>

                                <!-- Delete -->
                                <button value="Delete"
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>

                            </td>
                            
                        </tr>
                   
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">#1023</td>
                            <td class="p-3">Ahmed Ali</td>
                            <td class="p-3 font-medium">Rs 4,500</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            </td>
                            <td class="p-3">05 Feb 2026</td>
                            <td class="p-3 text-center space-x-2">

                                <!-- Dispatch -->
                                <button value 
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Dispatch
                                </button>

                                <!-- Delete -->
                                <button value="Delete"
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>

                            </td>
                        </tr>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">#1024</td>
                            <td class="p-3">Sara Khan</td>
                            <td class="p-3 font-medium">Rs 7,200</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Completed
                                </span>
                            </td>
                            <td class="p-3">04 Feb 2026</td>
                            <td class="p-3 text-center space-x-2">

                                <button value="dispatch" 
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Dispatch
                                </button>

                                <button value="Delete"
                                    type="submit"
                                    class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="md:hidden space-y-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between">
                        <span class="font-semibold">#1023</span>
                        <span class="text-sm text-gray-500">05 Feb 2026</span>
                    </div>

                    <p class="text-sm mt-1">Ahmed Ali</p>
                    <p class="font-medium mt-1">Rs 4,500</p>

                    <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                        Pending
                    </span>

                    <div class="flex gap-2 mt-3">
                        <button class="flex-1 bg-blue-600 text-white py-1 rounded text-sm">
                            Dispatch
                        </button>
                        <button class="flex-1 bg-red-600 text-white py-1 rounded text-sm">
                            Delete
                        </button>
                    </div>
                    
                </div>
            </div>

        </form>
        <!-- FORM END -->

    </div>

</x-layout>
