<x-Modals.main formAction="store">
    <x-slot name="title">
        New Address
    </x-slot>
    <x-slot name="content">
        <!-- Name -->
        <div class="mt-2 sm:mt-0">
            <x-label for="name" :value="__('Name')" class="block font-medium text-sm text-gray-700" />

            <x-input id="name" wire:model.lazy="state.name" type="text" :value="old('state.name')" required autofocus />
            @error('state.name')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-label for="phone" :value="__('Phone')" />
            <x-input id="phone" type="tel" name="phone" wire:model.lazy="state.phone" :value="old('state.phone')" required autofocus />
            <p class="tracking-wider text-gray-500 text-xs font-semibold mt-1">
                The phone number must start with <b class="font-bolder text-primary">+234</b>
            </p>
            @error('state.phone') <x-error-span>{{$message}} </x-error-span>@enderror
        </div>

        <!-- Street,Area,Building,C/Oet.c -->
        <div class="mt-4">
            <x-label for="street" :value="__('Street, Area, Building, C/Oet.c')" />

            <x-input id="street" type="text" name="street" wire:model.lazy="state.street" :value="old('state.street')" required autofocus />
            @error('state.street')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- Floor No., House No. et.c -->
        <div class="mt-4">
            <x-label for="house" value="__('Floor No., House No. et.c')" />

            <x-input id="house" type="text" name="house" wire:model.lazy="state.house" :value="old('state.house')" required autofocus />
            @error('state.house')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-label for="state" :value="__('State')" />
            <span id="state" class="flex justify-between py-2 border px-2 block py-2 rounded-l-nne mt-1 w-full py-1 rounded-md font-semibold shadow-sm border-gray-300 focus:border-indigo-300 text-sm text-gray-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <p class="text-xs tracking-wider">State/Region.</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
            @error('state')
                <p class="text-red-500 text-sm font-semibold">{{$message}}</p>
            @enderror
        </div>
        <!-- City -->
        <div class="mt-4">
            <x-label for="city" :value="__('City')" />

            <x-input id="city" type="text" wire:model.lazy="state.city" name="city" :value="old('state.city')" required autofocus />
            @error('state.city')
                <p class="text-red-500 text-sm font-semibold">{{$message}}</p>
            @enderror
        </div>
        <footer class="flex space-x-12 items-center">
            <p class="text-xs font-bold tracking-wider">Set as DEFAULT address</p>
            <div class="radio-container">
                <input wire:click="$toggle('default')" id="radio" class="rad" type="radio" value="" {{ $default ? 'checked' : '' }}>
                <label for="radio">
                    <span class="radio text-gray-500 tracking-wider text-xs"></span>
                </label>
            </div>
        </footer>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Address') }}
        </button>
    </x-slot>
</x-Modals.main>
