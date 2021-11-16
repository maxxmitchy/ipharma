<div class="" x-cloak >
    <div style="display: none;" @click="open = !open" x-show="open" class="duration-500 z-30 inset-0 bg-gray-800 opacity-40 fixed"></div>
    <div style="display: none;" @click="shop = !shop" x-show="shop" class="duration-500 z-30 inset-0 bg-gray-800 opacity-40 fixed"></div>

    <nav :class="{'translate-x-0 ease-in opacity-100 w-56':shop === true, '-translate-x-full ease-out opacity-0':shop === false}" class="z-50 overflow-y-scroll inset-0 transform duration-200 fixed bg-white h-screen shadow">
        <div class="flex justify-between">
            <p class="text-base font-semibold text-primary tracking-wider md:text-3xl px-4 pt-4">&rarr; iPharma Shop Area</p>
        </div>

        <ul class="relative mt-2 space-y-2">
            @foreach ([
                ['name' => 'Shop All', 'url' => '/shop'],
                ['name' => 'New In', 'url' => '/shop/new-in'],
                ['name' => 'Product A-Z', 'url' => '/shop/product-az'],
                ['name' => 'Deals/Sales', 'url' => '/shop/sales'],
                ['name' => 'Shop by Category', 'url' => '/category/allcategory'],
                ['name' => 'Vitamins and Supplements', 'url' => '/shop/vitaminsandsupplements'],
                ['name' => 'Sports Nutrition', 'url' => '/shop/sports-nutrition'],
                ['name' => 'Weight Management', 'url' => 'shop/weight-management'],
                ['name' => 'Immunity Support', 'url' => '/shop/immunity'],
                ['name' => 'Single Nutrients', 'url' => '/shop/single-nutrients'],
                ] as $navlink )
                <a href="{{$navlink['url']}}">
                    <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                        {{$navlink['name']}}
                    </li>
                </a>
            @endforeach
        </ul>
    </nav>

    <nav :class="{'translate-x-0 ease-in opacity-100 w-56':open === true, '-translate-x-full ease-out opacity-0':open === false}" class="overflow-y-scroll z-40 inset-0 transform duration-200 fixed bg-white h-screen shadow">
        <div class="flex justify-between">
            <p class="text-lg font-semibold tracking-wider md:text-3xl px-4 pt-4">iPharma</p>
        </div>
        @if (request()->route('checkout'))
            <ul class="relative mt-2 space-y-2">
                @foreach (App\Models\Category::active()->main()->get() as $category )
                    <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                        <a href="/">{{$category->name}}</a>
                        <x-Icons.ChevRight class="h-4 w-4"/>
                    </li>
                @endforeach
            </ul>
        @else
            <ul class="relative mt-2 space-y-2">
                <a @click="shop = true" type="button" class="w-full cursor-pointer">
                    <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                        Shop
                    </li>
                </a>
                @foreach ([
                    ['name' => 'Pharmacy', 'url' => '/pharmacy'],
                    ['name' => 'Health Checkups', 'url' => ''],
                    ['name' => 'Wholesale', 'url' => ''],
                    ['name' => 'Subscription Plans', 'url' => ''],
                    ['name' => 'Browse Coupon Center', 'url' => 'site-coupons'],
                    ] as $navlink )
                    <a href="{{$navlink['url']}}">
                        <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            {{$navlink['name']}}
                        </li>
                    </a>
                @endforeach
                <hr class="my-3">
                @if (auth()->check())
                    <div class="space-y-2">
                        <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            <a href="">My Coupons</a>
                        </li>
                        <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            <a href="">My Account</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                class="text-sm tracking-wider px-4 py-2 text-gray-600 font-medium"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Logout &rarr;
                            </a>
                        </form>
                    </div>
                @else
                    <div class="space-y-2">
                        <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            <a href="{{route('login')}}">Login</a>
                        </li>
                        <li class="flex justify-between items-center text-gray-600 font-medium text-sm tracking-wider block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            <a href="{{route('register')}}">Register</a>
                        </li>
                    </div>
                @endif
            </ul>
        @endif
        <x-Navigation.bottom-sidenav />
    </nav>
</div>
