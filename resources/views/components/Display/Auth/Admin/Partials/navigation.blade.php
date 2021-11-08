<br>
<x-Display.Auth.Admin.Partials.nav.nav-list url="/dashboard">
    <x-slot name="title">Home</x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list url="/">
    <x-slot name="title">All Users</x-slot>
    <div class="h-1 w-1 shadow text-white text-xs bg-red-500 rounded-full flex justify-center items-center"></div>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list url="/adminarea/sections">
    <x-slot name="title">Sections</x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list url="/adminarea/categories">
    <x-slot name="title">Category</x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list url="/adminarea/products">
    <x-slot name="title">Product</x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list url="/adminarea/orders">
    <x-slot name="title">Orders</x-slot>
    <div class="h-1 w-1 shadow text-white text-xs bg-red-500 rounded-full flex justify-center items-center"></div>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list dropdown="true">
    <x-slot name="title">Discounts</x-slot>
    <x-slot name="children">
        <x-Display.Auth.Admin.Partials.nav.option-list>

            <x-Display.Auth.Admin.Partials.nav.option-item url="/adminsup/all-colors">view discount</x-Display.Admin.Partials.nav.option-item>
        </x-Display.Auth.Admin.Partials.nav.option-list>
    </x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list dropdown="true">
    <x-slot name="title">Quick Links</x-slot>
    <x-slot name="children">
        <x-Display.Auth.Admin.Partials.nav.option-list>
            <x-Display.Auth.Admin.Partials.nav.option-item url="/adminarea/banners">
                Banners
            </x-Display.Auth.Admin.Partials.nav.option-item>
            <x-Display.Auth.Admin.Partials.nav.option-item url="/adminarea/brands">
                Brands
            </x-Display.Auth.Admin.Partials.nav.option-item>
            <x-Display.Auth.Admin.Partials.nav.option-item url="/adminarea/coupons">
                Coupons
            </x-Display.Auth.Admin.Partials.nav.option-item>
        </x-Display.Auth.Admin.Partials.nav.option-list>
    </x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list>
    <x-slot name="title">Reports</x-slot>
    <div class="h-1 w-1 shadow text-white text-xs bg-red-500 rounded-full flex justify-center items-center"></div>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
<x-Display.Auth.Admin.Partials.nav.nav-list>
    <x-slot name="title">Roles and Perms</x-slot>
</x-Display.Auth.Admin.Partials.nav.nav-list>
<!--  -->
