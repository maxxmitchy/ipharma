<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Banner;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryDisplay extends Component
{
    use WithPagination;

    public $showModal = false;

    public $category;
    public $categories;
    public $quantity = 1;
    public $banners;

    public function mount($name = null)
    {
        // try and catch block with exxception handler giving 404 not found here
        $this->category = Category::Where('name', str_replace('-', ' ', $name))->with('subcategories', 'products')->first();
    }

    public $listeners = ['updateCategory'];

    public function updateCategory(Category $category)
    {
        $this->category = $category->load(['products','subcategories']);
    }

    public function render()
    {
        $banners = Banner::inRandomOrder()->active()->get();

        $this->banners = $this->filter($banners);

        $products = Product::inRandomOrder()->paginate(10);

        return view('livewire.category-display', [
                'products' => $products,
                'category' => $this->category
                ])->layout('layouts.guest');
    }

    public function addToCart($id): void
    {
        Cart::add($id, $this->quantity);

        $this->emit('productAddedToCart');

        $this->notify('product successfully added to cart.');
    }

    public function filter($banners)
    {
        return $banners->filter(function ($banner) {
                return $banner->isfeatured;
                });
    }
}
