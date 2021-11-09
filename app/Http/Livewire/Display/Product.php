<?php

namespace App\Http\Livewire\Display;

use App\Facades\Cart;
use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{

    public $showModal = false;

    public $dialogModal = false;

    public $showError = false;

    public $showAddToCartSuccess = false;

    public $name = "";

    public $title = "";

    public $product;

    public $quantity = 1;

    public $currentUrl;

    public function mount($id)
    {
        $this->currentUrl = url()->current();

        $this->product = ModelsProduct::where('id', $id)->with('reviews', 'relatedProducts')->first();
    }

    public function render()
    {
        return view('livewire.display.product', ['product' => $this->product])->layout('layouts.guest');
    }

    public function view($name, $title)
    {
        $this->showModal = true;

        $this->title = $title;

        $this->name = $name;
    }

    public function close()
    {
        $this->showModal = false;

        $this->delivery = $this->returnandsecurity = $this->description = $this->reviews = false;
    }

    public function addToCart(): void
    {
        Cart::add($this->product->id, $this->quantity);

        $this->emit('productAddedToCart');

        $this->notify('product added to cart.');
    }
}
