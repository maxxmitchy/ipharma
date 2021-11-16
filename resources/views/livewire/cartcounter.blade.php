<a href="{{route('cart')}}" class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
    </svg>
    <small class="absolute -top-1.5 text-xs md:text-sm -right-1.5 font-black flex justify-center items-center text-red-600">
        {{$cartCount}}
    </small>
</a>
