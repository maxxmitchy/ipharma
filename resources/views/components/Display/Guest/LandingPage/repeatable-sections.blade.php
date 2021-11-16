<div class="px-3 my-5">
    <div class="flex justify-between items-center {{count($products) < 1 ? 'hidden' : ''}}">
        <h2 class="font-semibold tracking-wider text-lg md:text-2xl">{{$name}}</h2>
        <div class="flex space-x-1 items-center">
            <small class="text-base tracking-wider font-bold">see all</small>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </div>
    @if(!empty($products))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 sm:gap-6 py-3 md:py-5">
            <!-- product-card -->
            @foreach ($products as $key => $product)
                <livewire:partials.product-card :product="$product" :key="$key" />
            @endforeach
            <!-- end product-card -->
        </div>
        @if($products->count() > 8)
            <div class="w-full flex justify-center items-center my-4">
                <a href="#" class="tracking-wider font-bold text-center rounded-md text-sm md:text-xl border border-primary text-primary px-5 md:px-8 md:pt-2 md:pb-0 py-2">
                    load more..
                </a>
            </div>
        @endif
    @endif
</div>
<br class="hidden md:block">
