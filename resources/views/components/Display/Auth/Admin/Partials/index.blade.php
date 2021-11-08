<div class="h-screen bg-gray-50 col-span-5 px-3 sm:px-10 sm:py-5">
    <div class="flex justify-between items-center py-4 border-b mb-3 sm:mb-5">
        <h1 class="text-sm md:text-xl">{{ $title }}</h1>
        <div class="flex space-x-4">
            <x-dropdown>
                <x-slot name="trigger">
                    Bulk actions
                </x-slot>
                <x-slot name="content">
                    <a type="button"  wire:click="export" class="cursor-pointer hover:text-primary flex items-center space-x-2 text-xs font-semibold p-1 tracking-wider text-gray-500"><x-Icons.upload class="w-3 h-3"/> <span>Export</span></a>
                    <a type="button"  wire:click="deleteMany" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="cursor-pointer hover:text-primary flex items-center space-x-2 text-xs font-semibold p-1 tracking-wider text-gray-500"><x-Icons.trash class="w-3 h-3"/> <span>Delete</span></a>
                </x-slot>
            </x-dropdown>
            <livvewire:import-transactions />
            <div class="bg-primary p-2 rounded items-center justify-center flex">
                <span>
                    {{ $modalClick }}
                </span>
            </div>
        </div>
    </div>
    <div class="mb-4 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:justify-between sm:items-center" x-data="{open: false}">
        <div class="flex space-x-4">
            <x-Icons.table class="h-4 w-4 text-gray-500"/>
            <x-Icons.grid class="h-4 w-4 text-gray-500"/>
            <div class="flex">
                <div class="relative">
                    <x-Icons.filter class="text-gray-500" @click.prevent="open = !open" />
                    <div x-show="open" class="z-40 absolute top-0 right-0 w-40 bg-white shadow-lg mt-8 -mr-1 block py-1 overflow-hidden">
                        <label
                            class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                            <div class="text-teal-600 mr-3">
                                <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="select-none text-gray-700"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <input id="search" type="search" wire:model="search"
            class="text-sm w-full sm:w-60 border-0 pl-4 pr-4 py-2 rounded-md shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
            placeholder="Search...">
    </div>
    {{ $slot }}
</div>
