<div class="sm:grid sm:grid-cols-3 gap-6">
    <div class="col-span-2 sm:grid sm:grid-cols-2 gap-2 sm:gap-4">
        <div class="sm:col-span-2 sm:grid sm:grid-cols-3 gap-2">
            <!-- Brand -->
            <div class="text-gray-500 space-y-2 mt-2 sm:mt-0 mb-4 sm:mb-2">
                <x-label for="brand" :value="__('Brand')" />
                <x-selectInput id="brand" value="Select Brand" wire:model.defer="brand_id" :items="App\Models\Brand::all()">
                    <x-slot name="selected">
                        <span x-text="item.name" class="self-center ml-1 block"></span>
                    </x-slot>
                    <x-slot name="itemArray">
                        <span :class="{ 'font-semibold': activeItem === item.id }" class="self-center ml-1 block text-sm font-normal" x-text="item.name"></span>
                    </x-slot>
                </x-selectInput>
                @error('brand_id')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>

            <!-- Section -->
            <div class="text-gray-500 space-y-2 mb-4 sm:mb-2">
                <x-label for="section" :value="__('Section')" />
                <x-selectInput id="section" value="Select Section" wire:model.defer="section_id" :items="App\Models\Section::all()">
                    <x-slot name="selected">
                        <span x-text="item.name" class="self-center ml-1 block"></span>
                    </x-slot>
                    <x-slot name="itemArray">
                        <span :class="{ 'font-semibold': activeItem === item.id }" class="self-center ml-1 block text-sm font-normal" x-text="item.name"></span>
                    </x-slot>
                </x-selectInput>
                @error('section_id')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>

            <!-- Category -->
            <div class="space-y-2 text-gray-500 mb-4 sm:mb-2">
                <x-label for="category" :value="__('Category')" />
                <select id="category" wire:model="category_id"
                    class="w-full py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200
                    focus:ring-opacity-50 text-sm">
                    @forelse ($categorylevels as $category)
                        <option class="text-xs" value="{{$category->id}}">{{$category->name}}</option>
                        @foreach ($category->subcategories as $subcategory )
                            <option class="text-xs" value="{{$subcategory->id}}"> &nbsp;&nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;{{$subcategory->name}}</option>
                        @endforeach
                    @empty
                        <option value="0">Main</option>
                    @endforelse
                </select>
                @error('category_id')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>
        </div>
        <div class="sm:col-span-2 sm:grid sm:grid-cols-3 gap-2">
            <!-- Name -->
            <div class="space-y-2 mb-4 sm:mb-2">
                <x-label for="name" :value="__('Product Name')" />
                <x-input id="name" type="text" wire:model="product_name" :value="old('product_name')" />
                @error('product_name')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>

            <!-- Manufactured -->
            <div class="space-y-2 mb-4 sm:mb-2">
                <x-label for="meta_title" :value="__('Manufacturing Date')" />
                <x-input type="date" wire:model="manufacturing_date" :value="old('manufacturing_date')" />
                @error('manufacturing_date')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>

            <!-- Expiring -->
            <div class="space-y-2 mb-4 sm:mb-2">
                <x-label for="meta_title" :value="__('Expiry Date')" />
                <x-input  type="date" wire:model="expiry_date" :value="old('expiry_date')" />
                @error('expiry_date')
                    <x-error-span>{{$message}}</x-error-span>
                @enderror
            </div>
        </div>

        <!-- Meta Title -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="meta_title" :value="__('Meta title')" />
            <x-input id="meta_title" type="text" wire:model="meta_title" :value="old('meta_title')" />
            @error('meta_title')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- Meta keywords -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="meta_keywords" :value="__('Meta keywords')" />
            <x-input id="meta_keywords" type="text" wire:model="meta_keywords" :value="old('meta_keywords')" />
            @error('meta_keywords')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- Product description -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="product_description" :value="__('Product description')" />
            <x-constrained-textarea
                id="product_description"
                limit="500"
                rows="3"
                wire:model="product_description"
            />
            @error('product_description')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>

        <!-- meta description -->
        <div class="space-y-2 mb-4 sm:mb-2">
            <x-label for="meta_description" :value="__('Meta description')" />
            <x-constrained-textarea
                limit="500"
                rows="3"
                wire:model="meta_description"
            />
            @error('meta_description')
                <x-error-span>{{$message}}</x-error-span>
            @enderror
        </div>
    </div>

    <div class="lg:ml-5 p-5 border rounded-md shadow space-y-4">
        <!-- Main image -->
        <div class="mt-2">
            <x-label for="email" :value="__('Main Image')" />
            <div class="flex space-x-2 my-2">
                @if ($image)
                    <img src="{{$image->temporaryUrl()}}" class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100" alt="" />
                @endif
            </div>
            <div class="flex w-full bg-grey-lighter">
            <label class="w-36 flex flex-col items-center px-4 py-2 bg-white text-primary rounded-md shadow-lg tracking-wider border border-primary cursor-pointer hover:bg-primary hover:text-white">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">Select a file</span>
                <input id="files" wire:model.debounce.1000ms="main_image" type="file" class="hidden bg-white text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" />
            </label>
        </div>
        <br>
        <hr class="my-2">

        <!-- Other images -->
        <div class="mt-2">
            <x-label for="email" :value="__('Sub Images')" />
            <div class="flex space-x-2 my-2">
                @foreach ($images as $image)
                    <img src="{{$image->temporaryUrl()}}" class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100" alt="">
                @endforeach
            </div>
            <div class="flex w-full bg-grey-lighter">
            <label class="w-36 flex flex-col items-center px-4 py-2 bg-white text-primary rounded-md shadow-lg tracking-wider border border-primary cursor-pointer hover:bg-primary hover:text-white">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">Select files</span>
                <input id="files" wire:model.debounce.1000ms="sub_images" multiple type="file" class="hidden bg-white text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" />
            </label>
        </div>

        <div class="flex mt-5">
            <a onclick='Livewire.emit("openModal", "modal.add-attribute-form")' class="mr-4 p-2 rounded-md text-white text-sm cursor-pointer font-semibold tracking-wider bg-primary">Attributes</a>
            <a onclick='Livewire.emit("openModal", "modal.add-ingredient-form")' class="flex-1 flex justify-center p-2 rounded-md px-4 text-primary cursor-pointer text-sm font-semibold tracking-wider border border-primary">Ingredients</a>
        </div>
    </div>
</div>
