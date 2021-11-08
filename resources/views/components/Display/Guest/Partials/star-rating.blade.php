<div class="flex mt-1 space-x-1 justify-center items-center">
    <div class="flex">
        @foreach ( [1,2,3,4] as $i)
            <x-Icons.star class="h-3 h-3 text-yellow-500"/>
        @endforeach
        <x-Icons.star class="h-3 w-3"/>
    </div>
    <p class="text-xs tracking-wider font-bold text-gray-600">(134)</p>
</div>
