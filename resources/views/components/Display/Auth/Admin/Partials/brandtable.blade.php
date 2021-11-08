<x-Display.Auth.Admin.Partials.index>
    <x-slot name="title">
        Brands
    </x-slot>
    <x-slot name="modalClick">
        <x-Icons.plus wire:click="$emit('openModal', 'modal.add-brand-form')" class="h-4 w-4 font-bold text-white cursor-pointer"/>
    </x-slot>
    <x-Display.Table.table>
        <x-slot name="heading">
            <x-Display.Table.heading>
                Id
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Name
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Location
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Image
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Status
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Actions
            </x-Display.Table.heading>
        </x-slot>
        <x-slot name="body">
        @forelse ( $brands as $brand)
            <x-Display.Table.row>
                <x-Display.Table.cell>
                    {{ $brand->id }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $brand->name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $brand->location }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <img class="bg-gray-50 h-10" src="{{asset(Illuminate\Support\Str::after($brand->getFirstMedia()->getUrl(), 'http://localhost/'))}}" alt="image">
                </x-Display.Table.cell>

                <x-Display.Table.cell>
                    <div class="radio-container">
                        <input wire:click="toggle({{$brand->id}})" id="radio-{{$brand->id}}" class="rad" type="radio" value="{{$brand->status}}" {{$brand->status === 1 ? 'checked' : ''}}>

                        <label for="radio-{{$brand->id}}">
                            <span class="radio text-gray-500 tracking-wider {{$brand->status == 1 ? 'text-green-500' : 'text-red-500'}} text-xs"></span>
                        </label>
                    </div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="flex space-x-5">
                        <x-Icons.pencil-edit class="h-5 w-5 text-blue-500"/>
                        <x-Icons.trash wire:click="deletebrand({{$brand->id}})" class="h-5 w-5 text-red-500"/>
                    </div>
                </x-Display.Table.cell>

            </x-Display.Table.row>
            @empty
                <tr>
                    <td colspan="11">
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
