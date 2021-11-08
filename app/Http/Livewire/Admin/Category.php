<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category as ModelsCategory;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $listeners = [
        'categoryAdded' => 'render',
    ];

    public function render()
    {
        $categories = ModelsCategory::with('section','parentcategory')->paginate(6);

        return view('livewire.admin.category', ['categories' => $categories]);
    }

    public function toggle(ModelsCategory $category, $column)
    {
        if($column === "isfeatured"){
            $category->update([
                'isfeatured' => !$category->isfeatured,
            ]);
        }else{
            $category->update([
                'status' => !$category->status,
            ]);
        }
    }

    public function deleteCategory(ModelsCategory $category)
    {
        $category->delete();

        session()->flash('deletecategory', 'Category deleted successfully.');
    }
}
