<div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="space-y-4 flex flex-col justify-center items-center py-10 px-4 bg-purple-500 border-b border-gray-200">
                    <div class="flex justify-center pt-3 pb-5">
                        <input id="search" type="search" wire:model="search"
                            class="w-full sm:w-72 border-0 rounded pl-5 pr-4 py-2 shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Search...">
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="px-3 flex flex-col justify-center space-y-1 items-center">
                            <h4 class="tracking-wider text-white font-bold text-sm">0</h4>
                            <p class="text-xs tracking-wider text-gray-300 font-semibold">Wishlist</p>
                        </div>
                        <div class="border-l border-r px-3 flex flex-col justify-center space-y-1 items-center">
                            <h4 class="tracking-wider text-white font-bold text-sm">0</h4>
                            <p class="text-xs tracking-wider text-gray-300 font-semibold">Favourites</p>
                        </div>
                        <div class="px-3 flex flex-col justify-center space-y-1 items-center">
                            <h4 class="tracking-wider text-white font-bold text-sm">0</h4>
                            <p class="text-xs tracking-wider text-gray-300 font-semibold">Reviews</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="relative">
        <div class="w-full absolute -top-10 py-4 px-2 roundedborder bg-white">
            <div class="grid grid-cols-3 mt-4">
                <a wire:click="showOrderPage('unpaid')" class="flex flex-col justify-center space-y-1 items-center">
                    <div class="relative">
                        <img class="h-8 w-8" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/50/000000/external-wallet-investment-kiranshastry-lineal-kiranshastry.png"/>
                        <div class="absolute h-2 w-2 top-1 -right-2 bg-red-500 rounded-full flex-shrink-0"></div>
                    </div>
                    <p class="text-xs tracking-wider font-bold text-gray-800">Unpaid</p>
                </a>
                <div wire:click="showOrderPage('processing')" class="flex flex-col justify-center space-y-1 items-center">
                    <img class="h-8 w-8" src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/64/000000/external-processing-delivery-kiranshastry-lineal-color-kiranshastry.png"/>
                    <p class="text-xs font-bold tracking-wider text-gray-800">Processing</p>
                </div>
                <div wire:click="showOrderPage('delivered')" class="flex flex-col justify-center space-y-1 items-center">
                    <img class="h-8 w-8" src="https://img.icons8.com/dotty/80/000000/shipped.png"/>
                    <p class="text-xs font-bold tracking-wider text-gray-800">Shipped</p>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 h-full w-100 pt-20">
        <h2 class="mt-2 tracking-wider font-bold text-sm">Services</h2>
        <div class="grid grid-cols-4 mt-4">
            <div wire:click="showOrderPage('address')" class="px-3 flex flex-col justify-center space-y-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="text-xs tracking-wider text-gray-800 text-center">Address Book</p>
            </div>
            <div wire:click="showOrderPage('recentlyviewed')" class=" px-3 flex flex-col justify-center space-y-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                </svg>
                <p class="text-xs tracking-wider text-gray-800 text-center">Recently Viewed</p>
            </div>
            <div wire:click="showOrderPage('questions')" class="px-3 flex flex-col justify-center space-y-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
                <p class="text-xs tracking-wider text-gray-800 text-center">My Questions</p>
            </div>
            <div wire:click="showOrderPage('help')" class="px-3 flex flex-col justify-center space-y-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs tracking-wider text-gray-800 text-center">Help Center</p>
            </div>
        </div>
    </div>
    <!--  -->
    <br>
    <div class="px-4 w-100">
        <h2 class="my-2 tracking-wider font-bold text-sm">You May Like</h2>
        <div class="py-2 grid grid-cols-2 gap-4">

        </div>
    </div>
</div>
