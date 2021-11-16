<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use App\Models\Review;
use LivewireUI\Modal\ModalComponent;

class ReviewForm extends ModalComponent
{
    public $review;
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.modal.review-form');
    }

    public function store()
    {
        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $this->product->id,
            'body' => $this->review
        ]);

        $this->reset();

        $this->closeModal();
    }
}
