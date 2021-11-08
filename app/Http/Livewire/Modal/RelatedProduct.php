<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class RelatedProduct extends ModalComponent
{
    public $selection = [];

    public $product;

    public $search = null;

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
        $searchrelated = Product::query()
            ->search($this->search)
            ->with('category')
            ->get()->take(10);

        if($this->product){
            $searchrelated = $searchrelated->filter(function ($value, $key) {
                return $value->id !== $this->product->id && !$this->product->relatedProducts->contains($value->id);
            });
        }

        return view('livewire.modal.related-product', ['searchrelated' => $searchrelated]);
    }

    public function addtoSelection($id)
    {
        if (($key = array_search($id , $this->selection)) !== false) {
            unset($this->selection[$key]);
        }else{
            array_push($this->selection, $id);
        }
    }

    public function store()
    {
        $this->product->relatedProducts()->syncWithoutDetaching($this->selection);
    }
}
