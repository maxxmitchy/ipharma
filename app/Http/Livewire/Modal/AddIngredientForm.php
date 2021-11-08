<?php

namespace App\Http\Livewire\Modal;

use App\Http\Livewire\Admin\Ingredient;
use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;

class AddIngredientForm extends ModalComponent
{
    public $ingredients = [];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public $rules = [
        'ingredients.name' => ['required', 'string'],
        'ingredients.strength' => ['required', 'string'],
    ];

    public function render()
    {
        return view('livewire.modal.add-ingredient-form');
    }

    public function storeToSession(Request $request)
    {
        if($this->ingredients){
            $request->session()->push('ingredients[]', $this->ingredients);
        }

        $this->ingredients['name'] = $this->ingredients['strength'] = "";
    }

    public function closeAndUpdateAddProductForm()
    {
        $this->closeModalWithEvents([
            'productIngredientEvent',
            AddProductForm::getName() => ['productIngredientEvent', [true]]
        ]);
    }
}
