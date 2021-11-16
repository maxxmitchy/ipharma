<x-Navigation.Guest.Header.index>
    <x-Navigation.sidenav/>
    <x-slot name="navigation">
        <x-Icons.hamburger @click="open = !open" class="h-5 w-5 md:h-6 md:w-6"/>
    </x-slot>
    <x-slot name="navtitle">
        <a href="/" class="text-lg sm:text-2xl text-primary">iPharma</a>
    </x-slot>
    <x-slot name="iconlinks">
        <x-Icons.user url="{{route('dashboard')}}" class="h-5 w-5 md:h-6 md:w-6"/>
        <x-Icons.search @click="$dispatch('toggle-spotlight')" class="h-5 w-5 md:h-6 md:w-6"/>
        @livewire('cartcounter')
    </x-slot>
</x-Navigation.Guest.Header.index>
