<?php

namespace App\Http\Livewire\Modal;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class AllUserAddress extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        $userAddresses = User::find(auth()->id())->addresses()->get();

        return view('livewire.modal.all-user-address', [ 'addresses' => $userAddresses ]);
    }
}
