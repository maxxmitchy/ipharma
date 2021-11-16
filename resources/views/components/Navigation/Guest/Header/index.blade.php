<section class="flex flex-col px-3 py-3"  x-data="{open:false, shop: false}">
    <nav class="flex justify-between items-center">
        <div class="">{{$navigation}}</div>
        <div class="">
            <h2 class="text-lg tracking-wider font-bold">{{$navtitle}}</h2>
        </div>
        <input type="text" class="hidden md:flex w-72 md:w-96 py-1 px-4 rounded mr-2" placeholder="type to search...">
        <div class="flex space-x-4 md:space-x-8 items-center">{{$iconlinks}}</div>
    </nav>
    {{$slot}}
</section>
