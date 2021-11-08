<section class="flex flex-col px-3 pt-3"  x-data="{open:false}">
    <nav class="flex justify-between items-center">
        <div class="">{{$navigation}}</div>
        <div class="">
            <h2 class="text-lg tracking-wider font-bold">{{$navtitle}}</h2>
        </div>
        <div class="flex space-x-4 items-center">{{$iconlinks}}</div>
    </nav>
    {{$slot}}
</section>
