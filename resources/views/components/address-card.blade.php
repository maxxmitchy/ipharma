<div class="border text-gray-600 mt-2 p-2 space-y-2 rounded tracking-wider">
    @if ($default)
        <div class="mb-3 flex justify-between items-center">
            <div class="flex space-x-1 text-primary items-center">
                <x-Icons.location class="h-3 w-3" />
                <p class="font-semibold text-xs mt-0.5">Default</p>
            </div>
            <x-Icons.circle-mark class="h-3 w-3" />
        </div>
    @endif
    <span class="text-xs font-semibold tracking-wider">
        <p> {{ $address->name }} </p>
        <p> {{ $address->phone }} </p>
    </span>
    <p class="text-xs font-semibold tracking-wider">
        Room ## - {{ $address->house }},
        {{ $address->street }} Street,
        {{ $address->city }} - {{ $address->state }}
    </p>
</div>
