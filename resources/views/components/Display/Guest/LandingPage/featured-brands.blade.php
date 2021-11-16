<!--Featured Brands  -->
<section class="px-3">
    <h2 class="font-semibold tracking-wider text-lg md:text-2xl">Easily shop your favourite brands of products</h2>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-5 md:py-5">
        @foreach ($brands as $brand )
            <a href="{{route('brands.brand', ['name' => Illuminate\Support\Str::slug($brand->name)])}}" class="shadow rounded-md p-2 flex flex-col space-y-1 justify-center items-center">
                <img class="object-fit {{ $brand->name === 'Puritans Pride' ? 'bg-primary' : '' }} rounded h-24" src="{{asset(Illuminate\Support\Str::after($brand->getFirstMedia()->getUrl(), 'http://localhost/'))}}" alt="image">
                <p class="tracking-wider text-sm font-bold text-center">{{$brand->brand_name}}</p>
                <p class="text-xs sm:text-sm font-semibold text-gray-500 tracking-wider text-center">{{$brand->products->count()}} Products</p>
            </a>
            <!--<div class="text-md text-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 whitespace-nowrap"></div> -->
        @endforeach
    </div>
    <br>
</section>
<!-- End featured Brands -->
