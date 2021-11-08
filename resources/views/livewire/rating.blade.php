<div class="flex justify-center w-full">
    <div class="flex items-center" wire:loading.class="hidden" wire:target="setRating">
        @for ($i = 0; $i < $this->avgRating; $i++)
            @if ($review)
                <x-Icons.star wire:click="setRating({{ $i+1 }})" class="h-3 h-3 text-yellow-500"/>
            @else
                <x-Icons.star class="h-3 h-3 text-yellow-500"/>
            @endif
        @endfor

        @for ($i = $this->avgRating; $i < 5; $i++)
            @if ($review)
                <x-Icons.star wire:click="setRating({{ $i+1 }})" class="h-3 h-3 text-gray-400"/>
            @else
                <x-Icons.star class="h-3 h-3 text-gray-400"/>
            @endif
        @endfor

        <p class="ml-2 text-xs tracking-wider font-bold text-gray-500 flex justify-center items-center">
            ({{ $users }})
        </p>
    </div>
    <div wire:loading>
        <x-Icons.spinner class="h-5 w-5 animate-spin"/>
    </div>
</div>
