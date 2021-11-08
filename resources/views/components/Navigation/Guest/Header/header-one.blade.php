<x-Navigation.Guest.Header.index>
    <x-Navigation.sidenav/>
    <x-slot name="navigation">
        <x-Icons.hamburger @click="open = !open" class="h-5 w-5"/>
    </x-slot>
    <x-slot name="navtitle">
        <a href="/" class="text-lg">iPharma</a>
    </x-slot>
    <x-slot name="iconlinks">
        <x-Icons.user url="{{route('dashboard')}}" class="h-5 w-5"/>
        <x-Icons.search class="h-5 w-5"/>
        @livewire('cartcounter')
    </x-slot>
</x-Navigation.Guest.Header.index>
