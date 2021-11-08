<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Ingredient as ModelsIngredient;

class Ingredient extends Component
{
    public $ingredient_name;
    public $ingredient_strength;
    public $ingredient_description;

    public function rules()
    {
        return [
            'ingredient_name' => ['required'],
            'ingredient_strength' => ['required'],
            'ingredient_description' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.ingredient');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    function store(Request $request)
    {
        ModelsIngredient::create([
            'product_id' => $request->session()->get('id'),
            'name' => $this->ingredient_name,
            'strength' => $this->ingredient_strength,
            'description' => $this->ingredient_description,
        ]);

        $this->reset();
    }
}
