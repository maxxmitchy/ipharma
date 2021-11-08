<div class="wrapper space-x-4 p-3 md:px-28">
    @if (isset($banners))
        @foreach ($banners as $banner)
            <div class="p-1 rounded-lg item_banner flex flex-col space-y-1">
                <img class="object-fit h-44" src="{{asset(Illuminate\Support\Str::after($banner?->getFirstMedia()?->getUrl(), 'http://localhost/'))}}" alt="image">
                <h2 class="tracking-wider font-black text-sm">{{ $banner->name }}</h2>
                <p class="tracking-wider font-medium text-xs text-gray-500">{{ $banner->description }}</p>
            </div>
        @endforeach
    @endif
</div>
