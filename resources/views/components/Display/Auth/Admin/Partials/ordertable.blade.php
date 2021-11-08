<x-Display.Auth.Admin.Partials.index>
    <x-slot name="title">
        Orders
    </x-slot>
    <x-slot name="modalClick">
        <x-Icons.plus wire:click="$set('showModal', true)" class="h-4 w-4 font-bold text-white cursor-pointer"/>
    </x-slot>
    <x-Display.Table.table>
        <x-slot name="heading">
            <x-Display.Table.heading>
                Id
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Status
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Actions
            </x-Display.Table.heading>
        </x-slot>
        <x-slot name="body">
        @forelse ( $orders as $order)
            <x-Display.Table.row>
                <x-Display.Table.cell>
                    {{ $order->id }}
                </x-Display.Table.cell>

                <x-Display.Table.cell>
                    <div class="radio-container">
                        <input wire:click="toggle({{$order->id}})" id="radio-{{$order->id}}" class="rad" type="radio" value="{{$order->status}}" {{$order->status === 1 ? 'checked' : ''}}>

                        <label for="radio-{{$order->id}}">
                            <span class="radio text-gray-500 tracking-wider {{$order->status == 1 ? 'text-green-500' : 'text-red-500'}} text-xs"></span>
                        </label>
                    </div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="flex space-x-5">
                        <x-Icons.settings wire:click="showForm('attribute', {{$order->id}})" class="h-5 w-5 text-gray-500"/>
                        <x-Icons.pencil-edit class="h-5 w-5 text-blue-500"/>
                        <x-Icons.trash wire:click="deleteorder({{$order->id}})" class="h-5 w-5 text-red-500"/>
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
