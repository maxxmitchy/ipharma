<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Brand
    </x-slot>
    <x-slot name="content">
        <div class="sm:grid sm:grid-cols-2 gap-2">
        <!--Name -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" type="text" wire:model="state.name" :value="old('state.name')" />
            @error('state.name')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- location -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="location" :value="__('Location')" />
            <x-input id="location" type="text" wire:model="state.location" :value="old('state.location')" />
            @error('state.location')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="description" :value="__('Brand description')" />
            <x-constrained-textarea
                id="description"
                limit="255"
                wire:model="state.description"
            />
            @error('state.description')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!--brand image -->
        <div class="mt-2">
            <x-label for="email" :value="__('Brand Image')" />
            <div class="flex space-x-2 my-2">
                @if (isset($image))
                    <img src="{{$image?->temporaryUrl()}}" class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100" alt="image">
                @endif
            </div>
            <div class="flex w-full bg-grey-lighter">
                <label class="w-full flex flex-col items-center px-4 py-2 bg-white text-primary rounded-md shadow-lg tracking-wider border border-primary cursor-pointer hover:bg-primary hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input id="files" wire:model.defer="image" type="file" class="hidden bg-white text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" />
                </label>
            </div>
        </div>
    </div>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Brand') }}
        </button>
    </x-slot>
</x-Modals.main>
