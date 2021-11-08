<x-Display.Auth.Admin.index>
    @if (request()->route()->name('adminarea.products'))
        <x-Display.Auth.Admin.Partials.producttable :selected="$selected" :products="$products"/>
    @endif
</x-Display.Auth.Admin.index>
