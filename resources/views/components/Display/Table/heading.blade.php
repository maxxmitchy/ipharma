@props([
    'sortable' => null,
    'direction' => null
])

<th
    {{ $attributes->merge(['class' => 'text-left bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs'])}}
    >
    @unless ($sortable)
        <span class="text-left text-xs leading-4 font-bold text-cool-gray-500 uppercase tracking-wider">{{ $slot }}</span>
    @else
    <button {{ $attributes->except('class') }} class="space-x-1 text-left text-xs font-medium">
        <span>{{ $slot }}</span>
        <span>
            @if ($direction === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            @endif
        </span>
    </button>
    @endif
</th>
