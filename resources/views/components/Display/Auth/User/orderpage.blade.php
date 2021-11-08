<div class="pt-2">
    <div class="h-12 w-full text-xs bg-gray-50 rounded text-center">ad here</div>
    @switch($page)
        @case('unpaid')
            <x-Display.Auth.User.Partials.orders.unpaid :unpaid="$unpaid" />
            @break
        @case('processing')
            <x-Display.Auth.User.Partials.orders.processing :processing="$processing"/>
            @break
        @case('delivered')
            <x-Display.Auth.User.Partials.orders.delivered/>
            @break
        @case('closed')
            <x-Display.Auth.User.Partials.orders.closed/>
            @break

        @default
            <x-Display.Auth.User.Partials.orders.all-orders :unpaid="$unpaid" :processing="$processing" />
    @endswitch
</div>
