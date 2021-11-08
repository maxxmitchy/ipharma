<?php

namespace App\Http\Livewire\Display;

use App\Facades\Cart;
use App\Models\Banner;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class Shop extends Component
{
    public $dialogModal = false;

    public $lastCartContent;

    public function mount()
    {
        $lastItem = Cart::content();

        $this->lastCartContent = $lastItem->last();
    }

    protected $listeners = ['productAdded' => 'openDialogModal'];

    public function openDialogModal()
    {
        $this->dialogModal = true;

        $lastItem = Cart::content();

        $this->lastCartContent = $lastItem->last();
    }

    public function render()
    {
        $categories = Category::active()->get();

        $banners = Banner::active()->type('shop')->get()->take(3);

        return view('livewire.display.shop', [
            'featuredcategories' => $categories->filter(function ($category) {
                return $category->isfeatured;
            }),
            'banners' => $banners,
            'products' => Product::all()
        ]);
    }
}
