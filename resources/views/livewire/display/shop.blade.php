<div class="">
    <x-Modals.pop-up wire:model="dialogModal">
        <x-slot name="title">Added to your cart</x-slot>
        <x-slot name="body">
            @if (!empty($lastCartContent))
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <div class="h-20 w-20 mr-4">
                            <img alt="img" src="{{asset(Illuminate\Support\Str::after(App\Models\Product::find($lastCartContent['id'])->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}"
                                class="object-cover h-44">
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xs tracking-wider font-bold mb-3 mt-2">{{$lastCartContent['name']}}</h4>
                            <div class="flex mb-3 items-center">
                                <x-Icons.naira class="h-4 w-4" />
                                <b class="tracking-wider text-primary font-bold text-sm">{{number_format($lastCartContent['price'])}}</b>
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <a href="{{route('cart')}}" class="mb-3 px-3 cursor-pointer flex flex-1 py-1 text-xs w-100 tracking-wider font-bold bg-secondary rounded justify-center text-white cursor-pointer">View cart and checkout</a>
                                <a href="#" @click="$modals.show('')" class="mb-3 text-xs text-center cursor-pointer tracking-wider font-semibold text-gray-600 underline">continue shopping ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>
    </x-Modals.pop-up>

    <x-Navigation.Guest.Header.header-one/>
    <x-Display.Guest.LandingPage.banner :banners="$banners" />
    <x-Display.Guest.LandingPage.featured-categories :title="'Shop by Categories'" :featuredCategories="$featuredcategories"/>
    @if(!empty($products))
        <div class="grid grid-cols-2 gap-2 px-3 md:px-28">
            <!-- product-card -->
            @foreach ($products as $key => $product)
                <livewire:partials.product-card :product="$product" :key="$key" />
            @endforeach
            <!-- end product-card -->
        </div>
    @endif
    <br>
    <br>
</div>
