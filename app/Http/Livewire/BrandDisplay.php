<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class BrandDisplay extends Component
{
    public $showModal = false;
    
    public $brandProducts = [];

    public function mount($name = null)
    {
        // try and catch block with exxception handler giving 404 not found here
        $this->brandProducts = Brand::where('name', str_replace('-', ' ', $name))->with('products')->first();
    }

    public function render()
    {
        return view('livewire.brand-display', ['brandProducts' => $this->brandProducts])->layout('layouts.guest');
    }
}
