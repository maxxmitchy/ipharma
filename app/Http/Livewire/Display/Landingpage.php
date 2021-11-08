<?php

namespace App\Http\Livewire\Display;

use App\Facades\Cart;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Landingpage extends Component
{
    use WireToast, WithPagination;

    public $quantity = 1;

    public $banners;

    public $brands;

    public function render()
    {

        $banners = Banner::active()->type('landing')->get()->take(3);

        $this->brands = Brand::all()->take(5);

        $this->banners = $banners->filter(function ($banner) {
            return $banner->isfeatured;
        });

        $categories = Category::active()->get();

        $newproducts = Product::new()->with('category')->get()->take(10);

        $topselling = Product::top()->with('category')->get()->take(10);

        return view('livewire.display.landingpage', [
            'featuredcategories' => $categories->filter(function ($category) {
                return $category->isfeatured;
            }),
            'newproducts' => $newproducts,
            'topselling' => $topselling,
        ]);
    }

    public function addToCart($id): void
    {
        Cart::add($id, $this->quantity);

        $this->emit('productAddedToCart');

    }
}
