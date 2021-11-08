<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order as ModelsOrder;
use Livewire\Component;

class Order extends Component
{
    public $title = 'Oders';

    public $showModal = false;

    public function render()
    {
        $orders = ModelsOrder::all();

        return view('livewire.admin.order', ['orders' => $orders]);
    }
}
