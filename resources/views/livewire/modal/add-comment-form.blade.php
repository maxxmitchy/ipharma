<x-Modals.main formAction="store">
    <x-slot name="title">
        product comments
        <a wire:click="closeAndUpdate()" class="text-xs hover:text-blue-500 active:text-red-600 ml-8 underline tracking-wider capitalize font-bold text-primary">Done</a>
    </x-slot>
    <x-slot name="content">
        <div>
            <!-- Title -->
            <div class="mt-2">
                <x-input placeholder="enter title" class="placeholder-gray-500 placeholder-opacity-50 block text-sm w-full py-2 text-gray-500"
                    type="text" wire:model="comments.title" :value="old('comments.title')" required autofocus />
                @error('comments.title') <span class="placeholder-gray-500 placeholder-opacity-50 block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <!-- Description -->
            <div class="mt-2">
                <x-constrained-textarea
                    rows="6"
                    limit="500"
                    :value="old('comments.body')"
                    placeholder="comment description"
                    wire:model="comments.body"
                    class="placeholder-gray-500 placeholder-opacity-50 w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500"
                />
            </div>
        </div>

    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Comments') }}
        </button>
    </x-slot>

</x-Modals.main>
