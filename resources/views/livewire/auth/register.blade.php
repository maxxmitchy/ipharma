<form method="POST" wire:submit.prevent="store">
    @csrf
    <!-- First Name -->
    <div class="mt-4">
        <x-label for="first_name" :value="__('First Name')" />

        <x-input id="first_name" type="text" wire:model.debounce.1000ms="first_name" name="first_name" :value="old('first_name')" required />
        @error('first_name') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Last Name -->
    <div class="mt-4">
        <x-label for="last_name" :value="__('Last Name')" />

        <x-input id="last_name" type="text" wire:model.debounce.1000ms="last_name" name="last_name" :value="old('last_name')" required />
        @error('last_name') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" type="email" wire:model.debounce.1000ms="email" name="email" :value="old('email')" required />
        @error('email') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Phone -->
    <div class="mt-4">
        <x-label for="phone" :value="__('Phone')" />

        <x-input id="phone" type="tel" wire:model.debounce.1000ms="phone" name="phone" :value="old('phone')" required />
        @error('phone') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password"
            type="password"
            name="password"
            wire:model.debounce.1000ms="password"
            required autocomplete="new-password" />
            @error('password') <x-error-span>{{$message}}</x-error-span> @enderror
    </div>

    <div class="flex mt-4">
        <label for="terms" class="flex items-center">
            <input id="terms" required type="checkbox" class="rounded h-3 w-3 form-checkbox" name="terms">
            <span class="ml-2 text-xs sm:text-sm text-gray-500 tracking-wider">{{__('Agree to our terms of use and privacy.')}}</span>
        </label>
    </div>

    <x-button class="mt-3 bg-primary flex justify-center mb-4 block w-full ">
        {{ __('Register') }}  &rarr;
    </x-button>
    <a class="tracking-wider flex justify-center mt-2 font-semibold text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Login') }} &rarr;
    </a>
</form>
