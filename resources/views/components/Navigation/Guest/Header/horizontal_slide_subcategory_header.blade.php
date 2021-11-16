<div class="wrapper mb-2 space-x-4 px-3 pt-3 md:px-28">
    @foreach ($subcategories as $subcategory )
        <a href="{{route('category.category', ['name' => Illuminate\Support\Str::slug($subcategory->name)])}}" class="item-but font-bold border p-2 rounded tracking-wider text-xs">{{$subcategory->name}}</a>
    @endforeach
</div>
