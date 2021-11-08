<div>
    <!-- header -->
    <div class="" x-data="{open:false}">
        <div class="relative px-3 sm:px-28">
            <div class="hidden md:block absolute top-16 p-12 right-28 left-28"></div>
            <div class="sm:py-5 py-3 flex justify-between items-center">
                <div class="w-44 flex items-center">
                    @if ($content->count() > 0)
                        <a href="{{route('products.product', ['id' => $content->last()['id'], 'name' => Illuminate\Support\Str::slug(App\Models\Product::where('id', $content->last()['id'])->get('product_name')), 'category' => Illuminate\Support\Str::slug(App\Models\Product::find($content->last()['id'])->category->name), 'status' => 1 ])}}" class="">
                            <x-Icons.ChevLeft class="h-4 w-4 mr-6" />
                        </a>
                    @else
                        <a href="{{route('category.allcategory')}}" class="">
                            <x-Icons.ChevLeft class="h-4 w-4 mr-6" />
                        </a>
                    @endif
                    <p class="text-md font-semibold tracking-wider md:text-3xl">Shopping Bag</p>
                </div>
                <div class="hidden sm:flex flex-grow justify-between px-5 space-x-2 items-center">
                    <input type="text" class="w-96 shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-1 px-4 rounded mr-2" placeholder="type to search..">
                    <a href="" class="tracking-wider font-medium">Wellness guide </a>
                    <div class="flex space-x-1 items-center">
                        <a href="" class="tracking-wider font-medium">Shop Supplememts</a>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                @if ($content->count() > 0)
                    <div class="flex justify-between space-x-4 items-center sm:border sm:border-primary rounded-md p-2">
                        <x-Icons.heart class="h-4 w-4" />

                        <x-Icons.pencil-edit wire:target="deleteMany" wire:loading.class="hidden" wire:click="$set('showDeleteAndWishListButton', true)" class=" {{ $showDeleteAndWishListButton ? 'hidden' : ''  }} h-4 w-4" />

                        <svg wire:target="deleteMany" wire:loading.class="hidden" wire:click="$set('showDeleteAndWishListButton', false)" xmlns="http://www.w3.org/2000/svg" class="{{ !$showDeleteAndWishListButton ? 'hidden' : ''  }} h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <x-Icons.spinner wire:loading class="h-4 w-4 animate-spin" />
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end of header b-->

    <!--  -->
    <div class="px-3 pb-2">
        <div class="flex flex-col space-y-3">
                @forelse ($content as $key => $cartItem )
                    <div class="flex justify-between" wire:key="{{$key}}">
                        <input type="checkbox" class="{{ !$showDeleteAndWishListButton ? 'hidden' : ''  }} rounded-full mr-3 h-3 w-3 self-center"  wire:model="selected" value="{{$cartItem['id'] }}">
                        <div class="h-16 w-24 mr-4">
                            <img alt="img" src="{{asset(Illuminate\Support\Str::after(App\Models\Product::find($cartItem['id'])->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}"
                                class="object-cover h-44">
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xs tracking-wider font-bold mb-3 mt-2">{{$cartItem['name']}}</h4>
                            <div class="text-semibold mb-3 space-y-1">
                                <p class="tracking-wider font-bold text-xs">
                                    Category &rarr;
                                    <a href="" class="text-gray-500">{{$cartItem['category']}}</a>
                                </p>
                                <p class="tracking-wider font-bold text-xs">
                                    Brand &rarr;
                                    <a href="" class="text-gray-500">{{$cartItem['brand']}}</a>
                                </p>
                            </div>
                            <div class="flex mb-3 items-center">
                                <x-Icons.naira class="h-4 w-4" />
                                <b class="tracking-wider text-primary font-bold text-sm">
                                    {{number_format($cartItem['price'])}}
                                </b>
                            </div>
                            <div class="flex">
                                <div class="mr-8 flex space-x-2 items-center">
                                    <svg wire:click="updateCartItem({{ $key }}, 'minus')" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 font-semibold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                    </svg>
                                    <input disabled type="number" value="{{$cartItem->get('quantity')}}" class="rounded border-gray-300 w-10 text-xs font-semibold h-5 flex text-center">
                                    <svg wire:click="updateCartItem({{ $key }}, 'plus')" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 font-semibold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <div wire:loading.class="hidden" wire:target="removeFromCart({{ $key }})" class="flex space-x-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <small wire:click="removeFromCart({{ $key }})" class="mt-0.5 hover:text-red-500 text-xs font-bold">Delete</small>
                                </div>
                                <div wire:loading wire:target="removeFromCart({{ $key }})">
                                    <x-Icons.spinner  class="h-5 w-5 animate-spin"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr class="my-3">
                @empty
                    <!-- Show when cart empty -->
                    <img src="{{asset('img/empty_bag.png')}}" alt="">
                    <div class="py-12 flex justify-center items-center">
                        <a href="/category/allcategory" class="bg-primary py-2 px-3 rounded-md font-semibold text-sm tracking-wider text-white">
                            shop now &rarr;
                        </a>
                    </div>
                    <q class="text-md tracking-wider font-bold flex justify-center items-center">
                        &nbsp; You might like &nbsp;
                    </q>
                    <br>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach (App\Models\Product::inRandomOrder()->limit(10)->get() as $key => $product )
                            <livewire:partials.product-card :product="$product" :key="$key" />
                        @endforeach
                    </div>
                    <!-- End show when cart empty -->
                @endforelse
                <br>
                <br>
        </div>
    </div>
    <!--  -->
    @if($content->count() > 0)
        <br>
        <br>
        <div x-data="{show : @entangle('showDeleteAndWishListButton')}" style="box-shadow: 0px 0 30px rgba(0, 0, 0, 0.3);" class="sm:hidden fixed px-3 py-2 bg-white shadow- bottom-0 right-0 left-0">
            @error('selected')
                <x-error-span class="mb-2">{{ $message }} </x-error-span>
            @enderror
            <div style="display: none;" x-show="show" class="flex justify-between space-x-3">
                <x-anchor-button class="border border-gray-600" wire:click="deleteMany">
                    Delete
                </x-anchor-button>
                <x-anchor-button class="bg-primary text-white" wire:click="addToWishList">
                    Add Wishlist
                </x-anchor-button>
            </div>
            <x-anchor-button x-show="!show" href="{{route('checkout')}}" class="bg-primary text-white">
                Checkout ( {{$content->count()}} ) &rarr;
            </x-anchor-button>
            <div class="flex justify-between items-center">
                <h4 class="text-sm tracking-wider font-bold">Total</h4>
                <h4 class="text-sm tracking-wider text-primary flex items-center font-bold"><x-Icons.naira class="h-5 w-5" /> {{ $total }}</h4>
            </div>
        </div>
    @endif
</div>
