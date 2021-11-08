<x-Modals.main formAction="storeToSession">
    <x-slot name="title">
        Add Product Ingredients
        <a wire:click="closeAndUpdateAddProductForm()" class="text-xs ml-8 underline tracking-wider capitalize font-bold text-primary">Done</a>
    </x-slot>
    <x-slot name="content">
        <div>
            <!-- Name -->
            <div class="mt-2">
                <x-input placeholder="enter name" class="placeholder-gray-500 placeholder-opacity-50 block text-sm w-full py-2 text-gray-500"
                    type="text" wire:model="ingredients.name" :value="old('ingredients.name')" required autofocus />
                @error('ingredients.name') <span class="placeholder-gray-500 placeholder-opacity-50 block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <!-- Strength -->
            <div class="mt-3">
                <x-input placeholder="enter strength" class="placeholder-gray-500 placeholder-opacity-50 text-gray-500 block text-sm w-full py-2"
                    type="text" wire:model="ingredients.strength" :value="old('ingredients.strength')" required autofocus />
                @error('ingredients.strength') <span class="placeholder-gray-500 placeholder-opacity-50 block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <!-- Description -->
            {{-- <div class="mt-2">
                <x-constrained-textarea
                    rows="6"
                    limit="500"
                    :value="old('ingredients.description')"
                    placeholder="ingredient description"
                    wire:model="ingredients.description"
                    class="placeholder-gray-500 placeholder-opacity-50 w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500"
                />
            </div> --}}
        </div>

    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Ingredients') }}
        </button>
    </x-slot>

</x-Modals.main>
