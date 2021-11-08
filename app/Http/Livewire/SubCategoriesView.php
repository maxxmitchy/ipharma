<?php

namespace App\Http\Livewire;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class SubCategoriesView extends ModalComponent
{
    public $subcategories;

    public function mount(Category $category)
    {
        $this->subcategories = $category->subcategories;
    }
    public function render()
    {
        return view('livewire.sub-categories-view', ['categories' => $this->subcategories ]);
    }
}
