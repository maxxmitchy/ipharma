<section class="" x-data="{show : @entangle('showModal')}" @keydown.escape.window="show = false">
    <div x-show="show" @click="show = !show" class="z-40 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="overflow-y-scroll w-full sm:w-1/3 h-screen bg-white p-3 fixed bottom-0 top-0 right-0 sm:mt-0 z-50 sm:text-left">
        <div class="flex justify-between items-center">
            <x-Icons.minus @click="show = !show" class="cursor-pointer h-5 w-5 font-black" />
            <h4 class="font-black text-lg tracking-wider">Filter By</h4>
        </div>
        <br/>
        @if (true)
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero amet magnam fugit.
        @endif
    </div>
    <div>
    <!-- header -->
        <x-Navigation.Guest.Header.header-one/>
        <!-- end of header -->
        <x-Display.Guest.LandingPage.hero-carousel :banners="$banners" />
        @if (request()->routeIs('category.allcategory'))
            <div class="bg-blue-500 py-24 mt-3 w-full"></div>
        @else
        <!-- sub nav -->
        <x-Navigation.Guest.Header.sub_filter_header/>
        <!-- end sub nav  -->

        <!-- slide nav -->
        @if(!empty($category))
            <x-Navigation.Guest.Header.horizontal_slide_subcategory_header :subcategories="$category->subcategories"/>
        @endif
        <!-- end slide nav -->

        <!-- main items -->
        <div class="px-3 pb-5">

            <div class="flex mb-3 items-center">
                @if(!empty($category))
                    <h2 class="text-gray-800 mr-2 font-bold tracking-wider text-sm">{{$category->name}}</h2>
                    <p class="text-xs text-gray-500 font-semibold tracking-wider">{{$category->products->count()}} products</p>
                @else
                    <p class="text-xs mt-5 mb-3 text-gray-500 font-semibold tracking-wider">
                        Showing {{($products->currentpage()-1)*$products->perpage()+1}} to {{ $products->currentpage()*(($products->perpage() < $products->total()) ? $products->perpage(): $products->total())}} of {{ $products->total()}} entries
                    </p>
                @endif

            </div>
            <div class="grid grid-cols-2 gap-4">
                @if(!empty($category))
                    @foreach ($category->products as $key => $product)
                        <livewire:partials.product-card :product="$product" :key="$key" />
                    @endforeach
                @else
                    @foreach ($products as $key => $product)
                        <livewire:partials.product-card :product="$product" :key="$key" />
                    @endforeach
                @endif
                <!--  -->
            </div>
        </div>
        <!-- end main items -->

        <!-- footer -->
        <x-Navigation.Guest.bottom-fixed-footer/>
        <!-- end footer -->
        @endif
    </div>
</section>
