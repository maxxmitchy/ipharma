<x-Display.Auth.Admin.Partials.index>
    <x-slot name="title">
        Products
    </x-slot>
    <x-slot name="modalClick">
        <x-Icons.plus wire:click="$emit('openModal', 'modal.add-product-form')" class="h-4 w-4 rounded font-bold text-white cursor-pointer"/>
    </x-slot>
    <x-Display.Table.table>
        <x-slot name="heading">
            <x-Display.Table.heading>
                <input type="checkbox" class="-ml-1 h-3 w-3">
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Id
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Name
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                SKU
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Section
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Category
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Price
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Stock
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Quantity
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Status
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Actions
            </x-Display.Table.heading>
        </x-slot>
        <x-slot name="body">
        @forelse ( $products as $product )
            <x-Display.Table.row wire:key="row-{{ $product->id }}">
                <x-Display.Table.cell>
                    <input type="checkbox" class="h-3 w-3"  wire:model="selected" value="{{ $product->id }}">
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $product->id }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $product->product_name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ is_null($product->productattribute) ? '' : strtolower($product->productattribute->sku) }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $product->section->name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $product->category->name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ is_null($product->productattribute) ? '' : $product->productattribute->price }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ is_null($product->productattribute) ? '' : $product->productattribute->stock }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ is_null($product->productattribute) ? '' : $product->productattribute->quantity }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="radio-container">
                        <input wire:click="toggle({{$product->id}})" id="radio-{{$product->id}}" class="rad" type="radio" value="{{$product->status}}" {{$product->status === 1 ? 'checked' : ''}}>

                        <label for="radio-{{$product->id}}">
                            <span class="radio text-gray-500 tracking-wider {{$product->status == 1 ? 'text-green-500' : 'text-red-500'}} text-xs"></span>
                        </label>
                    </div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="flex space-x-5">
                        <x-Icons.question-mark-circle class="h-4 w-4 cursor-pointer" wire:click="$emit('openModal', 'modal.add-comment-form', {{ json_encode(['product' => $product->id]) }})" />
                        <svg wire:click="$emit('openModal', 'modal.related-product', {{ json_encode(['product' => $product->id]) }})" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                        <x-Icons.pencil-edit class="h-4 w-4 text-blue-500"/>
                        <x-Icons.trash wire:click="deleteProduct({{$product->id}})" class="h-4 w-4 text-red-500"/>
                    </div>
                </x-Display.Table.cell>

            </x-Display.Table.row>
            @empty
                <tr>
                    <td colspan="10">
                        <div class="flex flex-col space-y-4 justify-center items-center py-8">
                            <div class="space-x-4 flex justify-center items-center">
                                <i class="fas fa-inbox text-sm self-center text-gray-500"></i>
                                <span class="text-gray-500 self-center text-sm font-medium">No records found</span>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </x-slot>
    </x-Display.Table.table>
</x-Display.Auth.Admin.Partials.index>
