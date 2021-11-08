<div class="md:grid md:grid-cols-6">
    <div class="h-screen p-10 hidden sm:block bg-appwhite">
        <img src="" alt="img" class="mb-14">
        <x-Display.Auth.Admin.Partials.navigation/>
    </div>
    @if (request()->route()->name('adminarea.brands'))
        <x-Display.Auth.Admin.Partials.brandtable :brands="$brands"/>
    @endif
</div>
