<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Banner as ModelsBanner;

class Banner extends Component
{

    public function render()
    {
        $banners = ModelsBanner::all();

        return view('livewire.admin.banner', ['banners' => $banners]);
    }

    public function toggle(ModelsBanner $banner)
    {
        $banner->update([
            'status' => !$banner->status,
        ]);
    }

    public function deletebanner(ModelsBanner $banner)
    {
        $banner->delete();
    }
}
