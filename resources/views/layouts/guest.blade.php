<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iPharma') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- livewire styles -->
        @livewireStyles

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://www.unpkg.com/trix@1.3.1/dist/trix.css">

        <!-- Scripts -->
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>

    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <x-notify/>
            {{ $slot }}
        </div>


        <!-- livewire -->
        @livewire('livewire-ui-modal')
        @livewireScripts
        <script>
            window.$modals = {

                show(name) {
                    window.dispatchEvent(new CustomEvent('modal',{
                        detail: name
                    }));
                }
            }
        </script>
        <script src="https://www.unpkg.com/trix@1.3.1/dist/trix.js"></script>
    </body>
</html>
