<x-Modals.main formAction="store">
    <x-slot name="title">
        address book
    </x-slot>
    <x-slot name="content">
        @forelse ( $addresses as $address )
            <x-address-card :default="$address->default == 1" :address="$address" />
        @empty
            <div class="flex justify-center items-center">
                <p class="text-center tracking-wider font-semibold">Ummm... Your address book is empty. Click the button below to add an address</p>
                <a  class="bg-primary py-2 px-3 rounded-md font-semibold text-sm tracking-wider text-white">
                    new address &rarr;
                </a>
            </div>
        @endforelse
        <br>
    </x-slot>
    <x-slot name="buttons">

    </x-slot>
</x-Modals.main>
