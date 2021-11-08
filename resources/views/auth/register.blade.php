<x-guest-layout>
    <x-auth-card>
        <section class="py-8 px-5 space-y-8">
            <!--    Logo Here -->
            <img src="" alt="image">

            <div class="space-y-4">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <h2 class="tracking-wider text-2xl font-bold">Sign Up</h2>

                @livewire('auth.register')
            </div>
        </section>
    </x-auth-card>
</x-guest-layout>
