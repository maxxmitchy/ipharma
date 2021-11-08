<div class="px-3 pt-6 space-x-2 flex justify-between">
    <a href="#" onclick="Livewire.emit('openModal', 'categories-view')" class="border flex-1 rounded py-2 px-2 flex justify-between text-gray-500 space-x-1 items-center">
        <p class="text-xs font-semibold text-gray-500 tracking-wider">Category</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </a>
    <div @click="show = !show" class="flex-1 border rounded py-2 bg-gray-50 px-2 text-gray-500 flex justify-center space-x-1 items-center">
        <p class="text-xs font-semibold tracking-wider text-center">&rarr; Filter</p>
    </div>
</div>
