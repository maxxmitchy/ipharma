<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Products
        <a wire:click="resetForm" class="ml-8 cursor-pointer font-bold tracking-wider text-xs underline">reset</a>
    </x-slot>
    <x-slot name="content">
        <x-Display.Auth.Admin.Forms.product-form :attribute="$productAttribute" :ingredient="$productIngredient"  :categorylevels="$categorylevel" :image="$main_image" :images="$sub_images" />
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Product') }}
        </button>
    </x-slot>

</x-Modals.main>
