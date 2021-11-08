<x-guest-layout>
    @if (request()->route()->named('index'))
        <livewire:display.landingpage />
    @elseif (request()->route()->named('shop'))
        <livewire:display.shop />
    @elseif (request()->route()->named('pharmacy'))
        <livewire:display.pharmacy />
    @else
    @endif
</x-guest-layout>
