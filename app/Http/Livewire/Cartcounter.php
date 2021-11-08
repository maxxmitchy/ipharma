<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Cartcounter extends Component
{

    protected $listeners = [
        'productAddedToCart' => 'render',
    ];

    public function render()
    {
        return view('livewire.cartcounter', ['cartCount' => session()->has('shopping-cart') ? session('shopping-cart')->sum('quantity') : 0]);
    }
}
