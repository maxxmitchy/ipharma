<div>
    <!-- header -->
    <div class="" x-data="{open:false}">
        <div class="relative px-3 sm:px-28">
            <div class="hidden md:block absolute top-16 p-12 right-28 left-28"></div>
            <div class="sm:py-5 py-3 flex justify-between items-center">
                <header class="w-44 flex items-center">
                    <a href="{{route('cart')}}" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:hidden mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <p class="text-md font-semibold tracking-wider md:text-3xl">Checkout</p>
                </header>
                @if (session(''))

                @endif
                <div class="hidden sm:flex flex-grow justify-between px-5 space-x-2 items-center">
                    <input type="text" class="w-96 shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-1 px-4 rounded mr-2" placeholder="type to search..">
                    <a href="" class="tracking-wider font-medium">Wellness guide </a>
                    <div class="flex space-x-1 items-center">
                        <a href="" class="tracking-wider font-medium">Shop Supplememts</a>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of header -->

    <div class="px-3 flex justify-between items-center">
        <p class="text-sm py-2 text-primary font-bold tracking-wider">Delivery Method</p>
        <a wire:click="$emit('openModal', 'modal.all-user-address')" type="button" class="text-xs hover:text-gray-600 hover:underline font-semibold text-gray-500 tracking-wider flex space-x-2 items-center">
            my addresses
            <x-Icons.chevDown class="ml-2 h-3 w-3 " />
        </a>
    </div>
    <hr class="mb-2">
    <div class="px-3">
        @error('address')
            <p class="text-red-500 text-xs tracking-wider font-semibold mb-5">Please add a valid address to proceed to order.</p>
        @enderror
        @if (!empty($defaultAddress))
            <!-- default address -->
            <x-address-card :default="true" :address="$defaultAddress" />
        @endif
            <br>
            <a type="button" wire:loading.class="hidden" wire:click="$emit('openModal', 'modal.add-address-form')"
                class="hover:bg-secondary active:bg-secondary mb-2 border flex space-x-2 py-2 justify-center items-center
                        rounded text-xs tracking-wider font-semibold"
            >
                <x-Icons.plus class="h-3 w-3 mb-0.5 mr-2"/>
                New Address
            </a>

        <div class="mt-5 p-2 space-y-2 border rounded tracking-wider">
            <h4 class="text-sm font-bold tracking-wider">Delivery Method</h4>
            <hr>
            <span class="flex justify-between">
                <div class="flex flex-col">
                    <p class="text-xs tracking-wider font-semibold">
                        Expedicted Delivery Service
                    </p>
                    <small class="text-xs tracking-wider text-gray-500">< 1 business day(s)</small>
                </div>
                <p class="text-xs tracking-wider font-semibold flex items-center">
                    <x-Icons.naira-black class="h-3 w-3" />
                    900
                </p>
            </span>
            <hr>
            <span class="flex justify-between">
                <span class="flex space-x-1 items-center">
                    <p class="text-xs tracking-wider font-semibold">Delivery Insurance : </p>
                    <x-Icons.question-mark-circle class="h-3 w-3 text-gray-500" />
                </span>
                <p class="text-xs tracking-wider font-semibold flex items-center">
                    <x-Icons.naira-black class="h-3 w-3" />
                    2,000
                </p>
            </span>
        </div>
        <!--  -->
        <div class="mt-5 p-2 space-y-4 border rounded tracking-wider">
            <h4 class="text-sm font-bold tracking-wider">Discount</h4>
            <hr>
            <div class="flex justify-between">
                <x-checkbox wire:click="toggle('points')" checked="{{$points}}"  >
                    Point (Available 0)
                </x-checkbox>
                <p class="text-xs tracking-wider font-semibold flex items-center">
                    <x-Icons.naira-black class="h-3 w-3" />
                    0
                </p>
            </div>
            <div class="flex justify-between">
                <x-checkbox wire:click="toggle('coupon')" checked="{{ $coupon }}" >
                    Coupon
                </x-checkbox>
                <p class="text-xs tracking-wider font-semibold flex items-center">
                    <x-Icons.naira-black class="h-3 w-3" />
                    0
                </p>
            </div>
            <div class="flex justify-between">
                <x-checkbox wire:click="toggle('nodiscount')" checked="{{ $nodiscount }}" >
                    Do not use any discount
                </x-checkbox>
            </div>
        </div>
        <!--  -->
        <div class="mt-5 p-2 space-y-2 border rounded tracking-wider">
            <h4 class="text-sm font-bold tracking-wider">Shopping Bag</h4>
            <hr>
            <div class="wrapper space-x-4 px-3 pt-3 md:px-28">
                @foreach ($images as $key => $image )
                    <div class="item-but h-44 w-16">
                        <img alt="{{asset($image)}}" src="{{asset($image)}}" class="object-cover h-44">
                    </div>
                @endforeach
                <a href="{{route('cart')}}" class="flex items-center justify-center space-x-1">
                    <small class="text-xs font-semibold tracking-wider">
                        {{$images->count()}}
                    </small>
                    <small class="text-xs font-semibold tracking-wider">
                        items
                    </small>
                    <x-Icons.ChevRight class="h-3 w-3" />
                </a>
            </div>
        </div>
        <!--  -->
        <div class="mt-5 p-2 space-y-2 border rounded tracking-wider">
            <h4 class="text-sm font-bold tracking-wider">Payment Methods</h4>
            <hr>
            <x-checkbox wire:click="$set('payment', 'prepaid')" checked="{{ $payment === 'prepaid' }}">
                <div class="flex space-x-2">
                    <img src="https://img.icons8.com/color/48/000000/visa.png" class="h-5 w-5"/>
                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" class="h-5 w-5"/>
                </div>
            </x-checkbox>
            <hr>
            <x-checkbox wire:click="$set('payment', 'cod')" checked="{{ $payment === 'cod' }}">
                <p class="text-xs tracking-wider font-semibold">COD (Cash on Delivery)</p>
            </x-checkbox>
        </div>
        <!--  -->
        <div class="mt-5 p-2 space-y-2 border rounded tracking-wider">
            <h4 class="text-sm font-bold tracking-wider">Order Total</h4>
            <hr>
            <div class="space-y-4">
                <div class=" flex justify-between items-center">
                    <p class="text-xs tracking-wider font-semibold">Subtotal</p>
                    <small class="text-xs tracking-wider font-bold flex items-center">
                        <x-Icons.naira-black class="h-3 w-3"/>
                        {{$subtotal}}
                    </small>
                </div>
                <div class=" flex justify-between items-center">
                    <p class="text-xs flex items-center tracking-wider font-semibold">
                        Delivery Fee (from your default address)
                        <x-Icons.question-mark-circle class="ml-1 h-3 w-3" />
                    </p>
                    <small class="text-xs tracking-wider font-bold flex items-center">
                        <x-Icons.naira-black class="h-3 w-3"/>
                        900
                    </small>
                </div>
                <div class=" flex justify-between items-center">
                    <p class="text-xs tracking-wider font-semibold">
                        Coupon discount
                    </p>
                    <small class="text-xs tracking-wider font-bold flex items-center">
                        <x-Icons.naira-black class="h-3 w-3"/>
                        0
                    </small>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-xs tracking-wider font-semibold">Grand total</p>
                    <small class="text-xs tracking-wider font-bold flex items-center">
                        <x-Icons.naira-black class="h-3 w-3"/>
                        {{ number_format(intval(str_replace(',', '', $subtotal)) + 900) }}
                    </small>
                </div>
            </div>
        </div>
        <!--  -->
        <br><br><br><br>
        <div style="box-shadow: 0px 0 30px rgba(0, 0, 0, 0.3);" class="sm:hidden fixed px-3 py-2 bg-white bottom-0 right-0 left-0">
            @error('address') <span class="block mb-2 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            <a wire:click="order"
                class="mb-2 justify-center flex-1 flex
                    disabled:opacity-75 focus:border-blue-300 focus:ring focus:ring-blue-200
                    focus:outline-none font-bold focus:ring-opacity-50 bg-primary rounded mt-0
                    md:w-20 text-sm text-white py-2 px-5"
            >
                <span wire:loading.class="hidden">Place Order &rarr;</span>
                <x-Icons.spinner-white class="animate-spin h-5 w-5" wire:loading />
            </a>
            <div class="flex justify-between items-center">
                <h4 class="text-base tracking-wider font-bold">Total</h4>
                <h4 class="text-base tracking-wider text-primary font-bold flex items-center">
                    <x-Icons.naira class="h-3 w-3"/>
                    {{ number_format(intval(str_replace(',', '', $subtotal)) + 900) }}
                </h4>
            </div>
        </div>
    </div>
</div>
