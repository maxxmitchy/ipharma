<div class="px-3">
    <div class="flex justify-between items-center {{count($products) < 1 ? 'hidden' : ''}}">
        <h2 class="text-md tracking-wider font-black">{{$name}}</h2>
        <div class="flex space-x-1 items-center">
            <small class="text-sm tracking-wider font-bold">see all</small>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </div>
    @if(!empty($products))
        <div class="grid grid-cols-2 gap-2 py-3 md:px-28">
            <!-- product-card -->
            @foreach ($products as $key => $product)
                <livewire:partials.product-card :product="$product" :key="$key" />
            @endforeach
            <!-- end product-card -->
        </div>
    @endif
</div>
<br>
