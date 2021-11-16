<section class="" x-data="{show : @entangle('showModal')}" @keydown.escape.window="show = false">
    <div x-show="show" @click="show = !show" class="z-40 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="overflow-y-scroll w-full sm:w-1/3 h-screen bg-white p-3 fixed bottom-0 top-0 right-0 sm:mt-0 z-50 sm:text-left">
        <div class="bg-white space-y-2">
            <div class="flex space-x-8 items-center">
                <x-Icons.ChevLeft @click="show = !show" class="cursor-pointer h-4 w-4 font-black" />
                <h4 class="font-black text-base tracking-wider">{{$title}}</h4>
            </div>
            <hr/>
            @if($masterPage == "OrderPage")
                <div class="flex justify-between items-center">
                    <p wire:click="showOrderPage('all')" class="tracking-wider text-xs font-bold {{$page == 'all' ? 'text-primary' : ' text-gray-500'}} p-1">ALL</p>
                    <p wire:click="showOrderPage('unpaid')" class="tracking-wider text-xs font-bold {{$page == 'unpaid' ? 'text-primary font-bolder' : ' text-gray-500'}} p-1">Unpaid</p>
                    <p wire:click="showOrderPage('processing')" class="tracking-wider text-xs font-bold {{$page == 'processing' ? 'text-primary ' : ' text-gray-500'}} p-1">Processing</p>
                    <p wire:click="showOrderPage('delivered')" class="tracking-wider text-xs font-bold {{$page == 'delivered' ? 'text-primary' : ' text-gray-500'}} p-1">Delivered</p>
                    <p wire:click="showOrderPage('closed')" class="tracking-wider text-xs font-bold {{$page == 'closed' ? 'text-primary' : ' text-gray-500'}} p-1">Closed</p>
                </div>
            @endif
        </div>
        @switch($masterPage)
            @case('OrderPage')
                <x-Display.Auth.User.orderpage :page="$page" :processing="$processing" :unpaid="$unpaid" :delivered="$delivered" :cancelled="$cancelled" :timeleft="$timeleft" />
                <br>
            @break
            @case('AddressPage')
                <x-Display.Auth.User.addressPage/>
            @break
            @case('RecentlyViewed')
                <x-Display.Auth.User.recentlyviewed/>
            @break
        @endswitch
    </div>
    <div class="md:grid md:grid-cols-6">
        <div class="h-screen p-10 hidden sm:block bg-appwhite">
            <img src="" alt="img" class="mb-14">
            <x-Display.Auth.Admin.Partials.navigation/>
        </div>
        <x-Display.Auth.User.Partials.dashboard/>
    </div>
</section>
