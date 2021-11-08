<?php

namespace App\Http\Livewire\Modal;

use App\Models\Section;

use LivewireUI\Modal\ModalComponent;

class AddSectionForm extends ModalComponent
{
    public $state;

    public $rules = [
        'state.name' => ['required','string'],
    ];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }


    public function render()
    {
        return view('livewire.modal.add-section-form');
    }

    public function store()
    {
        Section::create($this->state);

        $this->closeModal();
    }
}
