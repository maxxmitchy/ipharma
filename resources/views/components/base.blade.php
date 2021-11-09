<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iPharma') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://www.unpkg.com/trix@1.3.1/dist/trix.css">

        <!-- Scripts -->
        <script defer src="https://unpkg.com/alpinejs@3.5.0/dist/cdn.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        {{ $slot }}
        <!-- livewire -->
        @livewire('livewire-ui-modal')
        @livewire('livewire-ui-spotlight')
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
