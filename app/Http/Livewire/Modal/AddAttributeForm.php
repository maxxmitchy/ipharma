<?php

namespace App\Http\Livewire\Modal;

use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;


class AddAttributeForm extends ModalComponent
{
    public $price, $sku, $stock, $quantity;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function render()
    {
        return view('livewire.modal.add-attribute-form');
    }

    public function storeToSession(Request $request)
    {
        $data = $this->validate(
            [
                'price' => 'required',
                'sku' => 'required',
                'stock' => 'required',
                'quantity' => 'required',
            ]
        );

        $request->session()->put('attributes', $data);

        $this->closeAndUpdateAddProductForm();
    }

    public function closeAndUpdateAddProductForm()
    {
        $this->closeModalWithEvents([
            'productAttributeEvent',
            AddProductForm::getName() => ['productAttributeEvent', [true]]
        ]);
    }
}
