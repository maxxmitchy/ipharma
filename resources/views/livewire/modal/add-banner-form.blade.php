<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Banner
    </x-slot>
    <x-slot name="content">
        <div class="sm:grid sm:grid-cols-2 gap-2">
            <!--Name -->
            <div class="space-y-2 my-4 sm:mt-0 sm:mb-2">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block text-sm w-full py-2 text-gray-500" type="text" wire:model.defer="state.name" :value="old('state.name')" required autofocus />
                @error('state.name') <span class="block mt-1 text-xs font-semibold text-red-600">{{$message}}</span>@enderror
            </div>

            <div class="mt-2 text-gray-500">
                <x-label for="banner_type" :value="__('Banner Type')" />
                <select id="banner_type" wire:model="state.type" class="w-36 sm:w-full py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                    @foreach (['shop', 'pharmacy', 'advert', 'coupon', 'landing' ] as $banner )
                        <option class="text-xs" value="{{$banner}}">{{$banner}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <x-label for="banner_type" :value="__('Banner Description')" />
                <x-constrained-textarea
                    limit="55"
                    placeholder="enter description"
                    wire:model="state.description"
                    class="placeholder-gray-500 placeholder-opacity-50 w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500"
                />
            </div>

            <!--banner image -->
            <div class="mt-2">
                <x-label for="email" :value="__('Banner Image')" />
                <div class="flex space-x-2 my-2">
                    @if (isset($image))
                        <img src="{{optional($image)->temporaryUrl()}}" class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100" alt="">
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
            <br>
        </div>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('Add Banner') }}
        </button>
    </x-slot>

</x-Modals.main>
