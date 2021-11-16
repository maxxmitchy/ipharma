<div class="px-3">
    <h2 class="tracking-wider text-lg md:text-2xl font-semibold mb-{{ $title  ? '3' : '' }}">{{$title}}</h2>
    <div class="wrapper space-x-4 py-3 md:py-5">
        @foreach ($featuredCategories as $category )
            <div class="flex item-cat md:w-28 flex-col md:mb-5">
                <a href="{{route('category.category', ['name' => Illuminate\Support\Str::slug($category->name)])}}"
                    class="rounded-md rounded-b-none bg-gray-50 w-full"
                >
                    <img alt="img" src="{{asset(Illuminate\Support\Str::after($category->getFirstMedia()?->getUrl(), 'http://localhost/'))}}" class="object-cover bg-gray-50 md:h-36">
                </a>
                <div class="rounded-md rounded-t-none bg-primary tracking-wider px-3 py-1">
                    <p class="text-xs sm:text-sm font-bold capitalize text-white whitespace-nowrap truncate">{{$category->name}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
