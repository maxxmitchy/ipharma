<x-Modals.main formAction="store">
    <x-slot name="title">
        add review
    </x-slot>
    <x-slot name="content">
        <x-rich-text wire:model.lazy="review" :initialValue="$review"/>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('continue') }}
        </button>
    </x-slot>
</x-Modals.main>
