<div class="">
    <div class="pt-3 flex mb-2 space-x-2">
        <p class="text-xs text-gray-500 tracking-wider">Average rating:</p>
        <div class="flex space-x-1">
            <livewire:rating :product="$product" />
        </div>
        <p class="text-xs text-gray-500 tracking-wider">4.6/5.0</p>
    </div>
    <div class="flex flex-wrap space-x-2 space-y-2 mt-2">
        <div class="tracking-wider border px-2 py-1 font-bold text-xs mt-2 mb-1 flex items-center">
            All(123)
        </div>
        <div class="tracking-wider border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Pictures(4)
        </div>
        <div class="tracking-wider border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Late Delivery(23)
        </div>
        <div class="tracking-wider border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Expired(123)
        </div>
        <div class="tracking-wider border px-2 py-1 font-bold text-xs mb-1 flex items-center">
            Others(12)
        </div>
    </div>
    <hr class="bg-gray-500 my-3">
    <div class="">
        @forelse($product->reviews as $review)
            <x-Modals.Partials.review>
                <x-slot name="name">
                    {{App\Models\User::find($review->user_id)->name}}
                </x-slot>
                <x-slot name="body">
                    {!! $review->body !!}
                </x-slot>
                <x-slot name="created">
                    {{ $review->created_at }}  |  {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                </x-slot>
            </x-Modals.Partials.review>
            <hr class="my-3">
        @empty
            <p class="text-xs tex-center text-gray-600">This product has no reviews yet</p>
        @endforelse
    </div>
</div>
