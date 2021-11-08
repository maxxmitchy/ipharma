<?php

namespace App\Http\Livewire\Modal;

use App\Models\Banner;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddBannerForm extends ModalComponent
{
    use WithFileUploads;

    public $state;

    public $image;

    public $rules = [
        'state.name' => ['required','string','max:100', 'unique:banners'],
        'state.type' => ['required'],
        'state.description' => ['required']
    ];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        return view('livewire.modal.add-banner-form');
    }

    public function store()
    {
        $banner = Banner::create($this->state);

        $banner->addMedia($this->image->getRealPath())->toMediaCollection();

        $this->reset();

        $this->closeModal();

    }
}
