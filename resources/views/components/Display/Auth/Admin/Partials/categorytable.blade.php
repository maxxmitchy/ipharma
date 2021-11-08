<x-Display.Auth.Admin.Partials.index>
    <x-slot name="title">
        Categories
    </x-slot>
    <x-slot name="modalClick">
        <x-Icons.plus wire:click="$emit('openModal', 'modal.add-category-form')" class="h-4 w-4 font-bold text-white cursor-pointer"/>
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
                Section
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Parent Category
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Description
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Status
            </x-Display.Table.heading>
            <x-Display.Table.heading>
                Actions
            </x-Display.Table.heading>
        </x-slot>
        <x-slot name="body">
        @forelse ( $categories as $category)
            <x-Display.Table.row>
                <x-Display.Table.cell>
                    {{ $category->id }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $category->name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    {{ $category->section->name }}
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="text-xs whitespace-nowrap tracking-wider">
                        @if ($category->parentcategory)
                            {{$category->parentcategory->name}}
                        @endif
                    </div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="text-xs whitespace-nowrap tracking-wider">{{ Illuminate\Support\Str::of($category->description)->limit(30) }}</div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="radio-container">
                        <input wire:click="toggle({{$category->id}})" id="radio-{{$category->id}}" class="rad" type="radio" value="{{$category->status}}" {{$category->status === 1 ? 'checked' : ''}}>

                        <label for="radio-{{$category->id}}">
                            <span class="radio text-gray-500 tracking-wider {{$category->status == 1 ? 'text-green-500' : 'text-red-500'}} text-xs"></span>
                        </label>
                    </div>
                </x-Display.Table.cell>
                <x-Display.Table.cell>
                    <div class="flex space-x-5">
                        <x-Icons.pencil-edit class="h-4 w-4 text-blue-500"/>
                        <x-Icons.trash wire:click="deletecategory({{$category->id}})" class="h-4 w-4 text-red-500"/>
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
    <br>
    <br>
    {{ $categories->links() }}
</x-Display.Auth.Admin.Partials.index>
