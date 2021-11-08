<?php

namespace App\Http\Livewire;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class CategoriesView extends ModalComponent
{
    public function render()
    {
        $categories = Category::with('subcategories')->active()->get();

        return view('livewire.categories-view', ['categories' => $categories]);
    }

    public function closeAndUpdateCategory($category)
    {
        $this->emit('updateCategory', $category);

        $this->closeModal();
    }
}
