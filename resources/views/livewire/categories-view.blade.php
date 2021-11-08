<x-Modals.main formAction="store">
    <x-slot name="title">
        select category &rarr;
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-2 gap-4 py-2">
            @foreach ($categories as $category)
                <div class="rounded-sm flex flex-col space-y-1">
                    <img wire:key="{{$category->id}}" wire:click="closeAndUpdateCategory('{{$category->id}}')" alt="{{$category->name}}" src="{{asset(Illuminate\Support\Str::after($category->getFirstMedia()->getUrl(), 'http://localhost/'))}}" class="object-cover h-24 rounded-md">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs tracking-wider font-semibold text-gray-500">{{$category->name}}</h4>
                        @if ($category->subcategories->count() > 0)
                            <x-Icons.ChevDown wire:click="$emit('openModal', 'sub-categories-view', {{ json_encode(['category' => $category->id])}})" class="h-3 w-3" />
                        @else
                            <x-Icons.vertical-ellipses class="h-3 w-3" />
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
    <x-slot name="buttons">

    </x-slot>
</x-Modals.main>
