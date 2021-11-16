<x-Modals.main formAction="store">
    <x-slot name="title">
        {{ $product->product_name}}
    </x-slot>
    <x-slot name="content">
        <div class="">
            <div class="wrapper space-x-1 pt-1 md:px-28">
                @foreach ($product->getMedia('subImages') as $image )
                    <img class="item-show-product"
                                    src="{{asset(Illuminate\Support\Str::after($image->getUrl(), 'http://localhost/'))}}"
                                    alt="image">
                @endforeach
            </div>
            <div class="flex justify-between mb-3 items-center">
                <div class="flex items-center mt-2">
                    <x-Icons.naira-black  class="h-3 w-3 mb-0.5"/>
                    <p class="tracking-wider font-bold text-sm font-bold">{{number_format($product->productattribute->price)}}</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{route('products.product', ['id' => $this->product->id, 'name' => Illuminate\Support\Str::slug($this->product->product_name), 'category' => Illuminate\Support\Str::slug($this->product->category->name), 'status' => 1 ])}}"
                        class="bg-gray-600 rounded text-white text-xs font-bold p-2">View product</a>
                    <button class="bg-primary rounded text-white text-xs font-bold p-2">Add to cart</button>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="buttons">

    </x-slot>
</x-Modals.main>
