<div class="sm:grid sm:grid-cols-2 gap-2">
    <!--Cost Price -->
    <div class="space-y-2 mb-4 sm:mb-2">
        <x-label for="price" :value="__('Price')" />
        <x-input id="price" type="number" wire:model.lazy="price" :value="old('price')" />
        @error('price') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Sku -->
    <div class="space-y-2 mb-4 sm:mb-2">
        <x-label for="sku" :value="__('Sku')" />
        <x-input id="sku" type="text" wire:model.lazy="sku" :value="old('sku')" />
        @error('sku') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Stock -->
    <div class="space-y-2 mb-4 sm:mb-2">
        <x-label for="stock" :value="__('Stock')" />
        <x-input id="stock" type="number" wire:model.lazy="stock" :value="old('stock')" />
        @error('stock') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Quantity of Drug type -->
    <div class="space-y-2 mb-4 sm:mb-2">
        <x-label for="quantity" :value="__('Quantity')" />
        <x-input id="quantity" type="text" wire:model.lazy="quantity" :value="old('quantity')" />
        <p class="tracking-wider text-gray-500 text-xs font-semibold mt-1">e.g. 30 softgels</p>
        @error('quantity') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>
</div>
