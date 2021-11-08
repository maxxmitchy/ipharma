<div @click.away="open = false" class="cursor-pointer relative" x-data="{ open:false, activeItem: @entangle($attributes->wire('model')), items: {{ $items }} }">
    <template x-for="item in items" :key="item.id">
        <button @click="open = !open" x-show="activeItem === item.id" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" class="cursor-pointer relative w-full border border-gray-300 py-2 rounded-md pr-8 text-left cursor-default focus:outline-none sm:text-xs">
            <div class="" x-text="item.section_id"></div>
            <span class="flex items-left text-sm md:w-6 whitespace-nowrap " style="widt: 1.4rem">
                {{$selected}}
            </span>
            <span class="absolute inset-y-0 right-2 flex pointer-events-none text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </button>
    </template>
    <div @click="open = !open" x-show.transition="open" class="z-10 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div style="z-index: 99;display:none;" x-show.transition="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute mt-1 w-full bg-white shadow-lg h-100 overflow-auto">
        <ul wire:click="updateAction()" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
            <li role="option" class="cursor-default select-none relative py-2 pl-1 pr-9">
                <div class="flex text-sm items-left">
                    {{$value}}
                </div>
            </li>
            <template x-for="item in items" :key="item.id">
                <li :class="{ 'text-white bg-green-600': activeItem === item.id }" @click="activeItem = item.id, open = !open" id="listbox-item-0" role="option" class="cursor-default select-none relative py-2 pl-1 pr-5">
                    <div class="flex text-sm items-left">
                        {{$itemArray}}
                    </div>
                </li>
            </template>
        </ul>
    </div>
</div>
