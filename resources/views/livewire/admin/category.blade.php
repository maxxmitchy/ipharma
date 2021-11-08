<x-Display.Auth.Admin.index>
    @if (request()->route()->name('adminarea.categories'))
        <x-Display.Auth.Admin.Partials.categorytable :categories="$categories"/>
    @endif
</x-Display.Auth.Admin.index>
