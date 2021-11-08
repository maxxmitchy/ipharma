<x-table>
    <x-slot name="heading">
        <x-table.heading>
            Delivery method
        </x-table.heading>
        <x-table.heading>
            Free delivery condition
        </x-table.heading>
        <x-table.heading>
            Delivery time business days
        </x-table.heading>
        <x-table.heading>
            Tracking number
        </x-table.heading>
    </x-slot>

    <x-slot name="body">
        <x-table.row>
            <x-table.cell>
                <p class="text-xs font-medium tracking-wider text-gray-900">
                    iPharma standard delivery
                </p>
            </x-table.cell>
            <x-table.cell>
                /
            </x-table.cell>
            <x-table.cell>
                <p class="text-xs font-medium tracking-wider">1 - 2</p>
            </x-table.cell>
            <x-table.cell>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </x-table.cell>
        </x-table.row>
    </x-slot>
</x-table>
