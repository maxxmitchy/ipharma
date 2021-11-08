<div class="mt-3">
    @if ($processing->count() > 0)
        <div class="border rounded mt-2">
            <div class="flex justify-between p-3">
                <h4 class="text-xs font-bold text-gray-600">Order No: 120234</h4>
                <h4 class="text-xs font-bold text-red-600">Processing Order</h4>
            </div>
            <hr>
            <div class="p-3">
                @foreach ($processing as $item )
                    <x-Display.Auth.User.Partials.orders.order_item_card :items="$item->orderitems"/>
                @endforeach
            </div>

            <div class="space-y-1 mb-3 flex flex-col items-end px-3">
                <h4 class="tracking-wider font-bold text-xs">Total: NGN 12,000.00</h4>
                <p class="text-xs tracking-wider text-gray-500 font-semibold">02:12:23:12</p>
                <div class="flex justify-end space-x-2">
                    <a href="" class="border rounded py-1 text-gray-700 font-bold border-gray-700 px-3 text-xs">Track order</a>
                    <a href="" class="border border-pink-500 text-pink-500 font-bold tracking-wider rounded text-xs px-3 py-1">Reminders</a>
                </div>
            </div>
        </div>
    @else
        <img src="{{asset('img/order-empty.png')}}" class="w-full" alt="img">
    @endif
</div>
