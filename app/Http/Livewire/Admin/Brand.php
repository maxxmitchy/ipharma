<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand as ModelsBrand;

class Brand extends Component
{
    public function render()
    {
        $brands = ModelsBrand::all();

        return view('livewire.admin.brand', ['brands' => $brands]);
    }

    public function toggle(ModelsBrand $brand)
    {
        $brand->update([
            'status' => !$brand->status,
        ]);
    }

    public function deletebrand(ModelsBrand $brand)
    {
        $brand->delete();
        toast()
            ->success('delete successful.')
            ->push();
    }
}
