<div class="mt-3">
    @if ($unpaid->count() > 0)
        @foreach ($unpaid as $item )
            <div class="border rounded mt-2">
                <div class="flex justify-between p-3">
                    <h4 class="text-xs font-bold text-gray-600">Order No: {{$item->order_id}}</h4>
                    <h4 class="text-xs font-bold text-red-600">Waiting for payment</h4>
                </div>
                <hr>
                <div class="p-3">

                        <x-Display.Auth.User.Partials.orders.order_item_card :items="$item->orderitems"/>

                </div>
                <div class="space-y-1 mb-3 flex flex-col items-end px-3">
                    <h4 class="tracking-wider font-bold text-xs">Total: NGN {{number_format($item->orderitems->sum('price') * $item->orderitems->sum('quantity')) }}</h4>

                    <div class="flex justify-end space-x-2">
                        <a href="" class="border rounded py-1 text-gray-700 font-bold border-gray-700 px-3 text-xs">Cancel</a>
                        <a href="" class="border border-primary text-primary font-bold tracking-wider rounded text-xs px-3 py-1">Checkout</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <img src="{{asset('img/order-empty.png')}}" class="w-full" alt="img">
    @endif
</div>
