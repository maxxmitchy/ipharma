<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Category
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-2 gap-2">
            <!-- Name -->
            <div class="mt-2">
                <x-input placeholder="enter name" class="placeholder-gray-500 placeholder-opacity-50 block text-sm w-full py-2 text-gray-500" type="text" wire:model="state.name" :value="old('state.name')" required autofocus />
                @error('state.name') <span class="placeholder-gray-500 placeholder-opacity-50 block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <!-- Url -->
            <div class="mt-2">
                <x-input placeholder="enter url" class="placeholder-gray-500 placeholder-opacity-50 text-gray-500 block text-sm w-full py-2" type="text" wire:model="state.url" :value="old('state.url')" required autofocus />
                @error('state.url') <span class="block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <div class="mt-2 text-gray-500">
                <a href="#" wire:click="$emit('openModal', 'modal.add-section-form')" class="tracking-wider text-xs font-bold text-primary">add new section</a>
                <x-selectInput value="Select Section" wire:model.defer="section_id" action="'section'" :items="App\Models\Section::active(1)->get()">
                    <x-slot name="selected">
                        <span x-text="item.name" class="self-center ml-1 block"></span>
                    </x-slot>
                    <x-slot name="itemArray">
                        <span :class="{ 'font-semibold': activeItem === item.id }" class="self-center ml-1 block text-sm font-normal" x-text="item.name"></span>
                    </x-slot>
                </x-selectInput>
            </div>
            <div class="mt-8 text-gray-500">
                <select id="category" wire:model="category_id" class="w-full sm:w-full py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                    @forelse ($categorylevel as $category )
                        <option class="text-xs" value="{{$category->id}}">{{$category->name}}</option>
                        @foreach ($category->subcategories as $subcategory )
                            <option class="text-xs" value="{{$subcategory->id}}"> &nbsp;&nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;{{$subcategory->name}}</option>
                        @endforeach
                    @empty
                        <option value="0">Main</option>
                    @endforelse
                </select>
            </div>

            <!-- Meta Title -->
            <div class="mt-2">
                <x-input placeholder="enter meta title" class="placeholder-gray-500 placeholder-opacity-50 block text-sm w-full py-2" type="text" wire:model="state.meta-title" :value="old('state.meta-title')" required autofocus />
                @error('state.meta-title') <span class="block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <!-- Meta keywords -->
            <div class="mt-2">
                <x-input placeholder="meta keyword" class="placeholder-gray-500 placeholder-opacity-50 block text-sm w-full py-2" type="text" wire:model="state.meta-keywords" :value="old('state.meta-keywords')" required autofocus />
                @error('state.meta-keywords') <span class="block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <div class="mt-2">
                <x-constrained-textarea
                    limit="255"
                    placeholder="enter description"
                    wire:model="state.description"
                    class="placeholder-gray-500 placeholder-opacity-50 w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500"
                />
            </div>

            <!-- meta description -->
            <div class="mt-2">
                <x-constrained-textarea
                    limit="255"
                    placeholder="meta description"
                    wire:model="state.meta-description"
                    class="placeholder-gray-500 placeholder-opacity-50 w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500"
                />
            </div>

            <!-- image -->
            <div class="mt-2">
                <div class="flex space-x-2 my-2">
                    @if (isset($image) && !empty($image))
                        <img src="{{$image->temporaryUrl()}}" class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100" alt="">
                    @endif
                </div>
                <div class="flex w-full bg-grey-lighter">
                    <label class="w-full flex flex-col items-center px-4 py-2 bg-white text-primary rounded-md shadow-lg tracking-wider border border-primary cursor-pointer hover:bg-primary hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input id="files" wire:model.defer="image" type="file" class="hidden bg-white text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" />
                    </label>
                </div>
            </div>
        </div>

    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Category') }}
        </button>
    </x-slot>
</x-Modals.main>
