<x-guest-layout>
    <x-auth-card>
        <section class="py-14    px-5 space-y-8">
            <!--    Logo Here -->
            <a href="{{route('index')}}" class="">
                <img src="" alt="image">
            </a>

            <div class="space-y-4">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <h2 class="tracking-wider text-xl font-bold">Sign In</h2>
                <p class="text-sm tracking-wider font-semibold">Please enter your details below.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class=""
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
                    <!-- <br> -->
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="h-3 rounded w-3 border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <br>
                    <x-button class="mt-1 bg-primary flex justify-center mb-4 block w-full ">
                        {{ __('Log in') }}
                    </x-button>
                    <hr>
                    @if (Route::has('password.request'))
                    <a class="tracking-wider flex justify-center mt-4 font-semibold text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                    <a class="tracking-wider flex justify-center mt-4 font-semibold text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Dont have an account? Register') }}
                    </a>
                </form>
                <!-- if env local -->
                @env('local')
                    <a class="tracking-wider flex justify-center mt-4 font-semibold text-sm text-gray-600 hover:text-gray-900" href="{{ route('dev-login') }}">
                        {{ __('Developer account') }}
                    </a>
                @endenv
            </div>
        </section>
        <div class=""></div>
    </x-auth-card>
</x-guest-layout>

