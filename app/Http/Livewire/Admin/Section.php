<?php

namespace App\Http\Livewire\Admin;

use App\Models\Section as ModelsSection;
use Livewire\Component;

class Section extends Component
{
    public function render()
    {
        $sections = ModelsSection::all();

        return view('livewire.admin.section', ['sections' => $sections]);
    }

    public function toggle(ModelsSection $section)
    {
        $section->update([
            'status' => !$section->status,
        ]);
    }

    public function delete(ModelsSection $section)
    {
        $section->delete();

        session()->flash('deletesection', 'Section deleted successfully.');
    }
}
