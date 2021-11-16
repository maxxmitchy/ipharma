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
    <x-Modals.overlay wire:model.defer="showModal">
        <x-slot name="title">
            <div class="">
                <div class="bg-white px-3 py-2 w-full fixed flex space-x-6 items-center">
                    <x-Icons.ChevLeft class="h-4 w-4" @click="show = false" />
                    <h2 class="text-md tracking-wider font-semibold">{{$title}}</h2>
                </div>
            </div>
            <br>
        </x-slot>
        <x-slot name="body">
            @switch($name)
                @case("shipping")
                    <x-Modals.Partials.shipping/>
                    @break
                @case("returns")
                    <x-Modals.Partials.returnandsecurity/>
                    @break
                @case("description")
                    <x-Modals.Partials.description :product="$product"/>
                    @break
                @case("reviews")
                    <x-Modals.Partials.reviews :product="$product"/>
                    @break
                @default
            @endswitch
        </x-slot>
    </x-Modals.overlay>
    <div class="relative" x-data="{show:false}">
        <div class="py-3 px-5 border-t border-b flex justify-between">
            <div class="text-gray-600 flex space-x-4 items-center">
                <a href="/" class=""><x-Icons.ChevLeft class="h-4 w-4"/></a>
                <h2 class="font-bold text-md tracking-wider">iPharma</h2>
            </div>
            <div class="flex space-x-6 items-center text-gray-600">
                <x-Icons.spinner class="h-4 w-4 animate-spin" wire:loading />
                <x-Icons.share class="h-4 w-4"/>
                <div class="" @click="show = !show">
                    <x-Icons.horizontal-ellipses class="h-4 w-4"/>
                </div>
            </div>
        </div>
        <div x-show="show" @click="show=false" class="inset-0 bg-gray-800 opacity-60 fixed"></div>
        <div style="display:none;" class="absolute right-5 top-10 bg-white p-3 shadow" x-show.transition="show">
            <x-Icons.ChevUp class="absolute h-3 w-3 text-white right-1" style="top: -.4rem;" />
            <div class="flex flex-col space-y-4">
                <a href="" class="text-gray-600 tracking-wider items-center flex">
                    <x-Icons.home class="h-4 w-4"/>
                    <span class="ml-2 text-sm">home</span>
                </a>
                <a href="" class="flex text-gray-600 tracking-wider items-center">
                    <x-Icons.heart class="h-4 w-4"/>
                    <span class="ml-2 text-sm">wishlist</span>
                </a>
            </div>
        </div>
    </div>
    <div class="wrapper space-x-1 pt-1 md:px-28">
        @foreach ($product->getMedia('subImages') as $image )
            <img class="item object-cover border"
                            src="{{asset(Illuminate\Support\Str::after($image->getUrl(), 'http://localhost/'))}}"
                            alt="image">
        @endforeach
    </div>
    <div class="px-5 mt-5">
        <div class="flex justify-between">

            <div class="flex flex-col space-y-1">
                <h2 class="flex tracking-wider font-bold items-center">
                    {{-- $product->discount() == 0 ? '' : 'N' . $product->discount() --}}
                    <x-Icons.naira />
                    <b class="{{
                        is_null($product->percentagediscount)
                        ? 'text-primary text-xl mt-0.5'
                        : 'text-red-800 line-through ml-1 text-sm'
                        }}">
                        {{number_format($product->productattribute->price)}}
                    </b>
                </h2>
                <small class="text-xs w-16 bg-red-50 text-red-700 font-bold tracking-wider text-center
                        {{ is_null($product->percentagediscount) ? 'hidden' : '' }}
                    ">
                        {{ is_null($product->percentagediscount) ? '' : $product->percentagediscount->value * 100}}% off
                </small>
            </div>
        </div>
        <hr class="my-3">
        <h2 class="tracking-wider font-bold text-sm">
            {{ $product->product_name }}
        </h2>
        <hr class="my-3">
        <div class="flex items-center space-x-2">
            <x-Icons.drug class="h-4 w-4" />
            <p class="font-bold text-gray-600 tracking-wider text-sm">
                {{ $product->productattribute->quantity }}
            </p>
        </div>
        <hr class="my-3">
        <div wire:click="view('shipping', 'Delivery Method')" class="flex justify-between">
            <div class="flex space-x-2 items-center">
                <div class="flex flex-col">
                    <p class="font-bold tracking-wider text-sm mb-1">Delivery</p>
                    <p class="text-xs tracking-wider text-gray-500">
                        {{$product->productattribute->stock > 0
                            ? 'In Stock, Dispatched on '. now()->toFormattedDateString()
                            : 'Out of Stock'
                        }}
                    </p>
                </div>
            </div>
            <x-Icons.ChevRight wire:loading.class="hidden" class="h-3 w-3 text-gray-500"/>
            <x-Icons.spinner class="h-4 w-4 animate-spin" wire:loading wire:target="view('shipping', 'Delivery Method')" />
        </div>
        <hr class="my-3">
        <div class="flex flex-col space-y-1">
            <p class="font-bold tracking-wider text-sm">Returns and Security</p>
            <div wire:click="view('returns','Return Policy and Security')" class="flex justify-between space-x-2">
                <div class="flex flex-col space-y-1">
                    <p class="text-xs text-gray-600 font-semibold tracking-wider">&rarr; 30Days to return</p>
                    <p class="text-xs text-gray-600 font-semibold tracking-wider">&rarr; Payment security</p>
                </div>
                <x-Icons.ChevRight wire:loading.class="hidden" class="h-3 w-3 text-gray-500"/>
                <x-Icons.spinner class="h-4 w-4 animate-spin" wire:loading wire:target="view('returns','Return Policy and Security')" />
            </div>
        </div>
        <hr class="my-3">
        <div wire:click="view('description', 'Description')" class="flex justify-between items-center">
            <p class="font-bold tracking-wider text-sm">Description & Ingredients</p>
            <x-Icons.ChevRight wire:loading.class="hidden" class="h-3 w-3 text-gray-500"/>
            <x-Icons.spinner class="h-4 w-4 animate-spin" wire:loading wire:target="view('description', 'Description')" />
        </div>
        <hr class="my-3">
        <!--  -->
        <div class="flex flex-col space-y-4">
            <div class="flex justify-between items-center">
                <p class="font-bold tracking-wider text-sm">Use with</p>
                <x-Icons.refresh class="h-3 w-3" />
            </div>
            <div class="wrapper space-x-3">
                @foreach ($product->relatedProducts as $key => $relatedProduct)
                    <livewire:partials.product-card :product="$relatedProduct" :key="$key" />
                @endforeach
            </div>
        </div>
        <!--  -->
        <hr class="my-3">
        <!--  -->
        <div class="flex flex-col space-y-4">
            <p class="font-bold tracking-wider text-sm">Faqs</p>
            <div class="">
                @foreach ($product->comments as $key => $comment)
                    <x-accordion :comment="$comment" />
                @endforeach
            </div>
        </div>
        <!--  -->
        <hr class="my-3">
        <div class="flex justify-between items-center">
            <p class="font-bold tracking-wider text-base">Reviews ({{$product->reviews->count()}})</p>
            <!-- <p class="text-sm text-red-500 tracking-wider"></p> -->
            <div class="mt-2 self-center">
                <livewire:rating :review="false" :product="$product" :key="$product->id" />
            </div>
        </div>
        <hr class="my-3">
        <!-- review -->
        @if ( $product->reviews->count() > 0 )
            @foreach($product->reviews as $review)
                <x-Modals.Partials.review>
                    <x-slot name="name">
                        {{App\Models\User::find($review->user_id)->name}}
                    </x-slot>
                    <x-slot name="body">
                        {!! $review->body !!}
                    </x-slot>
                    <x-slot name="created">
                        {{ $review->created_at }}  |  {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                    </x-slot>
                </x-Modals.Partials.review>
                <hr class="my-3">
            @endforeach
            <div class="flex justify-center">
                <a wire:click="view('reviews', 'Product Reviews')" class="cursor-pointer flex tracking-wider text-xs text-gray-600 font-semibold">
                    View All
                </a>
            </div>
            <hr class="my-3">
            <br>
        @else
            <p class="text-sm tex-center font-semibold text-gray-500">This product has no reviews yet</p>
        @endif
        <a wire:click="$emit('openModal', 'modal.review-form', {{ json_encode(['product' => $product->id]) }})" class="border p-2 cursor-pointer tracking-wider text-gray-600 font-semibold text-sm">
            add a review &rarr;
        </a>
        <br>
        <br>
        <!-- end of review -->
        <br>
        <x-Display.Guest.LandingPage.products-you-may-like :products="App\Models\Product::take(10)->get()"/>
        <br>
        <!--  -->
    </div>
    <br>
    <br>
    <br>
    <div style="box-shadow: 0px 0 30px rgba(0, 0, 0, 0.3);" class="sm:hidden fixed px-5 py-2 bg-white shadow- bottom-0 right-0 left-0">
        <div class="flex justify-between space-x-8 pb-2 items-center">
            @livewire('cartcounter')
            <button type="button" wire:click="addToCart"
                class="rounded-md disabled:opacity-75
                {{$product->productattribute->stock < 1 ? 'bg-red-500'
                : ((!empty(session('shopping-cart')) && session('shopping-cart')->has($this->product->id)) ?
                'bg-yellow-400 text-gray-700 font-bold'
                : 'focus:border-primary hover:bg-blue-900 focus:ring focus:ring-blue-200 focus:outline-none focus:ring-opacity-50 bg-primary')}}
                mt-0 md:w-20 text-sm text-white py-2 px-5 flex-1" {{$product->productattribute->stock < 1 ? 'disabled' : ''}}
                {{(!empty(session('shopping-cart')) && session('shopping-cart')->has($this->product->id)) ? 'disabled' : ''}}
                >
                @if ($product->productattribute->stock < 1)
                    Out of Stock
                @elseif ((!empty(session('shopping-cart')) && session('shopping-cart')->has($this->product->id)))
                    <span>&#10003;</span> product already in cart
                @else
                    <span wire:loading.class="hidden">Add to Cart</span>
                    <span class="w-100 flex justify-center items-center">
                        <x-Icons.spinner-white wire:loading wire:target="addToCart" class="self-center animate-spin h-6 w-6" />
                    </span>
                @endif
            </button>
        </div>
        <p class="text-xs text-gray-500 tracking-wider font-bold">
            100 points to be won on this purchase.
        </p>
    </div>
</div>
