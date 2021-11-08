<div class="">
    <div class="p-2 flex flex-col border rounded justify-between w-100">
        <a href="{{route('products.product', ['id' => $this->product->id, 'name' => Illuminate\Support\Str::slug($this->product->product_name), 'category' => Illuminate\Support\Str::slug($this->product->category->name), 'status' => 1 ])}}" class="space-y-3 self-center mb-3">
            <img alt="img" src="{{asset(Illuminate\Support\Str::after($this->product->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}" class="object-cover bg-gray-50 h-44">
            <p class="font-bold tracking-wider text-center text-xs">{{Illuminate\Support\Str::limit($this->product->product_name,25)}}</p>
        </a>
        <livewire:rating :review="false" :product="$this->product" :key="$this->product->id" />
        <div class="space-y-3 w-100 mt-3">
            <div class="flex justify-center items-center">
                <x-Icons.naira-black class="h-3 w-3 mb-0.5" />
                <h5 class="font-bold tracking-wider text-sm text-center">{{number_format($this->product->productattribute->price)}}</h5>
            </div>
            @if ($this->product->productattribute->stock < 1)
                <p class="text-center tracking-wider text-red-500 text-xs font-bold">Out of Stock</p>
                <a wire:click="notifyMe({{$this->product->id}})" class="cursor-pointer py-1  flex flex-1 w-100 tracking-wider text-xs font-semibold bg-gray-600 rounded justify-center text-white cursor-pointer">notify Me !!</a>
           @elseif (!empty(session('shopping-cart')) && session('shopping-cart')->has($this->product->id))
                <div class="flex space-x-3 justify-center items-center">
                    <div class="bg-primary p-1 text-white rounded flex justify-center items-center">
                        <svg wire:click="updateCartItem({{ $this->product->id }}, 'minus')" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 font-semibold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </div>

                    <p wire:loading.class="hidden" class="font-bold tracking-wider text-sm">{{ $this->content->get($this->product->id)['quantity'] }}</p>

                    <div wire:loading>
                        <x-Icons.spinner class="h-5 w-5 animate-spin"/>
                    </div>

                    <div class="bg-primary p-1 text-white rounded flex justify-center items-center">
                        <x-Icons.plus wire:click="updateCartItem({{ $this->product->id }}, 'plus')" class="h-3 w-3 font-bold text-white"/>
                    </div>
                </div>
            @else
                <a wire:click="addToCart({{$this->product->id}})" class="cursor-pointer flex flex-1 py-1 text-xs w-100 tracking-wider font-bold bg-secondary rounded-md justify-center text-white cursor-pointer">
                    <p wire:loading.class="hidden">Add to cart</p>
                    <div wire:loading>
                        <x-Icons.spinner class="h-5 w-5 animate-spin"/>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>

<!-- &#128722; cart -->
