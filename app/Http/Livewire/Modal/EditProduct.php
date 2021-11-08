<?php

namespace App\Http\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;

class EditProduct extends ModalComponent
{
    public $product;

    public $state;

    public $rules = [
        'state.product_name' => ['required'],
        'state.section_id' => ['required'],
    ];

    public function render()
    {
        return view('livewire.modal.edit-product');
    }
}
