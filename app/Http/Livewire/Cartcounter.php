<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cartcounter extends Component
{

    protected $listeners = [
        'productAddedToCart' => 'render',
    ];

    public function render()
    {
        return view('livewire.cartcounter', ['cartCount' => optional(session('shopping-cart'))->sum('quantity') ?? 0]);
    }
}
