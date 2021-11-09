<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class ShowProduct extends ModalComponent
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        return view('livewire.modal.show-product');
    }
}
