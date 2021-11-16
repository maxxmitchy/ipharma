<!-- footer -->
<div class="px-5">
    <br>
    <br>
    <br>
    <div style="box-shadow: 0px 0 30px rgba(0, 0, 0, 0.8);" class="z-50 sm:hidden fixed px-5 py-2 bg-white shadow bottom-0 right-0 left-0">
        <div class="flex justify-between">
            <a href="{{route('index')}}" class="flex flex-col justify-center">
                <x-Icons.home class="h-5 w-5 self-center"/>
                <small style="font-size: .7rem;" class="tracking-wider font-semibold text-xs text-gray-700 mt-0.5">Home</small>
            </a>
            <a href="/category/allcategory" class="flex flex-col justify-center">
                <x-Icons.grid class="h-5 w-5 self-center"/>
                <small style="font-size: .7rem;" class="tracking-wider font-semibold text-xs text-gray-700 mt-0.5">Category</small>
            </a>
            <a href="{{route('dashboard')}}" class="flex flex-col justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="self-center h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <small style="font-size: .7rem;" class="tracking-wider font-semibold text-xs text-gray-700 mt-0.5">Account</small>
            </a>
        </div>
    </div>
</div>

<!-- end footer -->
