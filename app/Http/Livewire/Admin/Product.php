<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $search = null;

    public $selected = [];

    public function render()
    {
        $products = ModelsProduct::query()
                ->search($this->search)
                ->with('category','section')
                ->paginate(10);

        return view('livewire.admin.product', ['products' => $products]);
    }

    public function deleteProduct(ModelsProduct $product)
    {
        $product->delete();
    }

    public function deleteMany()
    {
        $products = ModelsProduct::whereKey($this->selected);

        dd($products);

        $products->delete();
    }

    public function export()
    {
        return response()->streamDownload(function () {
            echo ModelsProduct::whereKey($this->selected)->toCsv();
        }, 'product.csv');
    }
}
