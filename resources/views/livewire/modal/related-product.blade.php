<x-Modals.main formAction="store">
    <x-slot name="title">
        Add Related Products
    </x-slot>
    <x-slot name="content">
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="border rounded-sm p-4 mt-4 space-y-3 ">
                <img alt="img" src="{{asset(Illuminate\Support\Str::after($product->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}" class="object-cover bg-gray-50 h-56">
                <p class="tracking-wider text-sm text-center leading-4 font-semibold text-gray-500">{{$product->product_name}}</p>
            </div>
            <div class="space-y-3 mt-5">
                <input wire:model="search" type="text" value="old('search')" placeholder='search..' autofocus class="self-center block py-1 w-full text-sm tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="grid grid-cols-2 gap-2">
                    @foreach($searchrelated as $searchitem)
                        <img alt="img" wire:click="addtoSelection({{$searchitem->id}})" src="{{asset(Illuminate\Support\Str::after($searchitem->getFirstMedia('main')->getUrl(), 'http://localhost/'))}}" class="{{in_array($searchitem->id, $selection) === true ? 'bg-blue-300 p-1' : 'bg-gray-50 p-1' }} object-cover bg-gray-50 h-44">
                    @endforeach
                </div>
            </div>
        </div>
        <br>
    </x-slot>
    <x-slot name="buttons">
        <button type="submit" class="px-4 py-2 inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer mt-2 bg-blue-500 flex justify-center mb-4 text-xs py-0 block w-full ">
            {{ __('add related products') }}
        </button>
    </x-slot>

</x-Modals.main>
