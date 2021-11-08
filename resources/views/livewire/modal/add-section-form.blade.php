<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Section
    </x-slot>
    <x-slot name="content">
        <div class="space-y-2 my-4 sm:mb-2">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block text-sm w-full py-2 text-gray-500" type="text" wire:model.defer="state.name" :value="old('state.name')" required autofocus />
            @error('state.name') <span class="block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
        </div>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Section') }}
        </button>
    </x-slot>
</x-Modals.main>
