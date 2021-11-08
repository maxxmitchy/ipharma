<x-Modals.main formAction="store">
    <x-slot name="title">
        Select SubCategories &rarr;
    </x-slot>
    <x-slot name="content">
        <div class="flex space-x-1 items-center pt-2">
            <p wire:click="$emit('closeModal')" class="cursor-pointer tracking-wider text-xs font-semibold text-gray-600">categories</p>
            <x-Icons.ChevRight class="h-3 w-3 text-gray-600" />
            <p class="cursor-pointer tracking-wider text-xs font-semibold text-gray-600">subcategories</p>
        </div>
        <div class="grid grid-cols-2 gap-4 pb-2">
            @foreach ($subcategories as $category)
                <div class="rounded-sm flex flex-col space-y-1">
                    <img wire:key="{{$category->id}}" wire:click="closeAndUpdateCategory('{{$category->id}}')" alt="{{$category->name}}" src="{{asset(Illuminate\Support\Str::after($category->getFirstMedia()->getUrl(), 'http://localhost/'))}}" class="object-cover h-24 rounded-md">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs tracking-wider font-semibold text-gray-500">{{$category->name}}</h4>
                        <x-Icons.vertical-ellipses class="h-3 w-3" />
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
    <x-slot name="buttons">

    </x-slot>
</x-Modals.main>
