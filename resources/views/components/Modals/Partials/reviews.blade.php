<div class="">
    <div class="pt-3 flex mb-2 space-x-2">
        <p class="text-xs text-gray-500 tracking-wider">Average rating:</p>
        <div class="flex space-x-1">
            @foreach ( [1,2,3,4] as $i)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            @endforeach
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 mt-0.5 ml-0.5 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
        </div>
        <p class="text-xs text-gray-500 tracking-wider">4.6/5.0</p>
    </div>
    <div class="flex flex-wrap space-x-1">
        <div class="border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            All(123)
        </div>
        <div class="border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Pictures(4)
        </div>
        <div class="border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Late Delivery(23)
        </div>
        <div class="border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Expired(123)
        </div>
        <div class="border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Others(12)
        </div>
    </div>
    <hr class="bg-gray-500 my-1">
    <div class="">
        @forelse ($reviews as $review)
            <x-modalContent.review>
                <x-slot name="name">
                    {{$review->user->name}}
                </x-slot>
                <x-slot name="body">
                    {{$review->body}}
                </x-slot>
            </x-modalContent.review>
        <hr class="my-2">
        @empty
            <p class="text-xs tex-center text-gray-600">This product has no reviews yet</p>
        @endforelse
    </div>
</div>
