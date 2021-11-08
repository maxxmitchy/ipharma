<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;

class AddCommentForm extends ModalComponent
{
    public $comments = [];

    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public $rules = [
        'comments.title' => ['required', 'string'],
        'comments.body' => ['required', 'string'],
    ];

    public function render()
    {
        return view('livewire.modal.add-comment-form');
    }


    public function store(Request $request)
    {
        if($this->comments){
            $request->session()->push('comments[]', $this->comments);
        }

        $this->comments['title'] = $this->comments['body'] = "";
    }

    public function closeAndUpdate()
    {
        foreach (session()->get('comments[]') ?? [] as $comment) {
            $this->product->comments()->create([
                'title' => $comment['title'],
                'body' => $comment['body']
            ]);
        }

        session()->forget('comments[]');

        $this->closeModal();
    }
}
