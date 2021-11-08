<div class="wrapper space-x-4 px-3 pt-3 md:px-28">
    @foreach ($subcategories as $subcategory )
        <a href="{{route('category.category', ['name' => Illuminate\Support\Str::slug($subcategory->name)])}}" class="item-but p-2 tracking-wider text-xs bg-gray-50">{{$subcategory->name}}</a>
    @endforeach
</div>
