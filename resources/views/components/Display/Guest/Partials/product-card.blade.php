@foreach ($products as $product )
    <div class="p-2 flex flex-col border rounded justify-between w-100">
        <a href="{{route('products.product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->product_name), 'category' => Illuminate\Support\Str::slug($product->category?->name), 'status' => 1 ])}}" class="space-y-3 self-center mb-3">
            <img alt="img" src="{{asset(Illuminate\Support\Str::after($product->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}" class="object-cover bg-gray-50 h-44">
            <p class="font-bold tracking-wider text-center text-xs">{{Illuminate\Support\Str::limit($product->product_name,25)}}</p>
            <!-- <x-Display.Guest.Partials.star-rating/> -->
        </a>
        <livewire:rating :product="$product" :key="$product->id" />
        <div class="space-y-3 w-100">
            @if ($product->productattribute->stock < 1)
                <p class="text-center tracking-wider text-red-500 text-xs font-bold">Out of Stock</p>
                <a wire:click="notifyMe({{$product->id}})" class="cursor-pointer py-1  flex flex-1 w-100 tracking-wider text-xs font-semibold bg-gray-600 rounded justify-center text-white cursor-pointer">notify Me !!</a>
            @else
                <div class="flex justify-center items-center">
                    <x-Icons.naira-black class="h-3 w-3 mb-0.5" />
                    <h5 class="font-bold tracking-wider text-sm text-center">{{number_format($product->productattribute->price)}}</h5>
                </div>
                <a wire:click="addToCart({{$product->id}})" class="cursor-pointer flex flex-1 py-1 text-xs w-100 tracking-wider font-bold bg-secondary rounded-md justify-center text-white cursor-pointer">Add to cart</a>
            @endif
        </div>
    </div>
@endforeach


<!-- &#128722; cart -->
