<section class="" x-data="{show : @entangle('showModal')}" @keydown.escape.window="show = false">
    <div x-show="show" @click="show = !show" class="z-40 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="overflow-y-scroll w-full sm:w-1/3 h-screen bg-white p-3 fixed bottom-0 top-0 right-0 sm:mt-0 z-50 sm:text-left">
        <div class="flex justify-between items-center">
            <x-Icons.minus @click="show = !show" class="cursor-pointer h-5 w-5 font-black" />
            <h4 class="font-black text-lg tracking-wider">{{$title}}</h4>
        </div>
        <br/>
        <!--  -->
    </div>
    <div class="md:grid md:grid-cols-6">
        <div class="h-screen p-10 hidden sm:block bg-appwhite">
            <img src="" alt="img" class="mb-14">
            <x-Display.Auth.Admin.Partials.navigation/>
        </div>
        @if (request()->route()->name('adminarea.categories'))
            <x-Display.Auth.Admin.Partials.ordertable :orders="$orders"/>
        @endif
    </div>
</section>
