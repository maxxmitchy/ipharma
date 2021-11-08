<?php

namespace App\Http\Livewire\Modal;

use App\Models\Category;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddCategoryForm extends ModalComponent
{
    use WithFileUploads;

    public $section_id = 1;

    public $category_id = 0;

    public $state;

    public $image;

    public $rules = [
        'state.parent_id' => ['required'],
        'section_id' => ['required'],
        'category_id' => ['required'],
        'state.name' => ['required', 'string', 'max:255', 'unique:categories'],
        'state.description' => ['required'],
        'state.url' => ['required', 'string', 'max:255', 'unique:categories'],
        'state.meta-title' => ['required'],
        'state.description' => ['required'],
        'state.meta-description' => ['required'],
        'state.meta-keyword' => ['required'],
    ];

    public function updateAction()
    {

    }

    public function render()
    {
        $categorylevel = Category::MainCategories($this->section_id)->with('subcategories', 'section')->get();

        return view('livewire.modal.add-category-form', ['categorylevel' =>$categorylevel]);
    }

    public function store()
    {

        $category = Category::create(array_merge($this->state,
            [
                'parent_id' => $this->category_id,
                'section_id' => $this->section_id,
            ]
        ));

        $category->addMedia($this->image->getRealPath())->toMediaCollection();

        $this->reset();

        $this->emit('categoryAdded');

    }
}
