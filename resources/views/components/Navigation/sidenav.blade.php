<div class="" x-cloak>
    <div @click="open = !open" x-show="open" class="duration-500 z-50 inset-0 bg-gray-800 opacity-40 fixed"></div>
    <nav :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0':open ===false}" class="overflow-y-scroll z-50 inset-0 transform duration-200 fixed w-56 bg-white h-screen shadow">
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
                @foreach ([
                    ['name' => 'Pharmacy', 'url' => '/pharmacy'],
                    ['name' => 'Shop', 'url' => '/shop'],
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

                @endif
            </ul>
        @endif
        <x-Navigation.bottom-sidenav />
    </nav>
</div>
