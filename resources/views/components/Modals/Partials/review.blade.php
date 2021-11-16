<div class="space-y-2" wire:click="reviews" x-data="{images : false}">
    <div class="flex justify-between items-center">
        <div class="flex space-x-2 items-center">
            <div class="h-8 w-8 rounded-full bg-blue-500"></div>
            <p class="font-bold tracking-wider text-sm">{{$name}}</p>
        </div>
    </div>
    <span class="text-sm text-gray-600 tracking-wider"><br>{{$body}}</span>
    <div style="display:none" x-show="images" class="grid grid-cols-4 gap-1">
        <div class="h-16 bg-red-500"></div>
        <div class="h-16 bg-red-500"></div>
    </div>
    <div class="flex justify-between items-center" style="font-size: .85rem;">
        <small class="tracking-wider text-gray-600">{{$created}}</small>
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
            </svg>
            <small class="text-gray-500 text-xs">0</small>
        </div>
    </div>
</div>
