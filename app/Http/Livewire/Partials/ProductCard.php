<?php

namespace App\Http\Livewire\Partials;

use App\Facades\Cart;
use Livewire\Component;

class ProductCard extends Component
{
    public bool $inCart = false;

    public $product;

    public $content;

    public function mount($product)
    {
        $this->product = $product;

        $this->content = Cart::content();
    }

    public function render()
    {
        return view('livewire.partials.product-card');
    }

    public function addToCart($id)
    {
        Cart::add($id, 1);

        $this->updateCart();

        $this->emit('productAddedToCart');

        $this->emit('productAdded');
    }

    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);

        $this->updateCart();
    }

    public function updateCart()
    {
        $this->content = Cart::content();
    }
}
