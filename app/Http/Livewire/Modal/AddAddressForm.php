<?php

namespace App\Http\Livewire\Modal;

use App\Models\Address;
use LivewireUI\Modal\ModalComponent;

class AddAddressForm extends ModalComponent
{
    public $state;

    public $default = 0;

    public $rules = [
        'state.name' => ['required','string','max:255'],
        'state.phone' => ['required','regex:/^(\+234)[0-9]{10}$/'],
        'state.house' => ['required'],
        'state.street' => ['required'],
        'state.city' => ['required']
    ];

    protected $validationAttributes = [
        'state.name' => 'your full name',
        'state.phone' => 'phone number',
        'state.house' => 'house number',
        'state.street' => 'street name',
        'state.city' => 'city name'
    ];

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function render()
    {
        return view('livewire.modal.add-address-form');
    }

    public function store()
    {
        $this->validate();

        Address::create(array_merge($this->state,
            [
                'user_id' => auth()->id(),
                'state' => 'Lagos',
                'default' => $this->default,
            ]
        ));

        $this->notify('Address added successfully.');

        $this->emit('closeModal');

        $this->render();
    }
}
