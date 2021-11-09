<section class="tracking-wider space-y-4">
    <q class="text-md tracking-wider font-bold flex justify-center items-center">
        &nbsp; You might also like &nbsp;
    </q>
    <div class="grid grid-cols-2 gap-2">
        @foreach ($products as $key => $product)
            <livewire:partials.product-card :product="$product" :key="$key" />
        @endforeach
        <!-- end product-card -->
    </div>
</section>
