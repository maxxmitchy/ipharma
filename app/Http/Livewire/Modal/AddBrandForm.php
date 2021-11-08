<?php

namespace App\Http\Livewire\Modal;

use App\Models\Brand;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Usernotnull\Toast\Concerns\WireToast;

class AddBrandForm extends ModalComponent
{
    use WithFileUploads, WireToast;

    public $state;

    public $image;

    public $rules = [
        'state.name' => ['required','string','max:100', 'unique:banners'],
        'state.location' => ['required'],
        'state.description' => ['required']
    ];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        return view('livewire.modal.add-brand-form');
    }

    public function store()
    {
        $brand = Brand::create($this->state);

        $brand->addMedia($this->image->getRealPath())->toMediaCollection();

        $this->reset();

        $this->closeModal();

    }
}
