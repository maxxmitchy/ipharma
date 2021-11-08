@if($items->count() > 0)
    @foreach ( $items as $order )
        <div class="flex justify-between mb-3">
            <img class="w-24 mr-3" src="{{asset(Illuminate\Support\Str::after(App\Models\Product::find($order->product_id)->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}" alt="image">
            <div class="flex-1">
                <h4 class="text-xs tracking-wider text-gray-500 font-bold mb-2">{{$order->product_name}}</h4>

                <div class="flex justify-between mb-2 items-center">
                    <b class="tracking-wider font-bold text-xs">NGN {{number_format($order->price)}}</b>
                    <p class="text-xs tracking-wider">x {{$order->quantity}}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
