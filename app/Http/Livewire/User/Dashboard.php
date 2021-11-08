<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public $showModal = false;

    public $masterPage = 'OrderPage';

    public $page = "all";

    public $title = "My Orders";

    private function orders() {

        return User::find(auth()->id())->orders()->with('orderitems');

    }

    public function render()
    {
        $unpaid = $this->orders()->unpaid()->get();

        $unpaid->map(function($item) {
            $item->total = $item->orderitems->sum('price');
        });

        $deliveredOrders = $this->orders()->status('delivered')->get();

        $processingOrders = $this->orders()->status('processing')->get();

        $cancelledOrder = $this->orders()->status('cancelled')->get();

        return view('livewire.user.dashboard', [
            'timeleft' => Carbon::now()->addMinutes(50),
            'unpaid' => $unpaid,
            'delivered' => $deliveredOrders,
            'processing' => $processingOrders,
            'cancelled' => $cancelledOrder,
        ]);
    }

    public function showOrderPage($page)
    {
        $this->showModal = true;

        $this->title = "My Orders";

        $this->masterPage = "OrderPage";

        switch ($page) {
            case 'unpaid':
                $this->page = $page;
                break;
            case 'processing':
                $this->page = $page;
                break;
            case 'delivered':
                $this->page = $page;
                break;
            case 'closed':
                $this->page = $page;
                break;
            case 'all':
                $this->page = $page;
                break;
            case 'address':
                $this->title = "My Address";
                $this->masterPage = "AddressPage";
                break;
            case 'recentlyviewed':
                $this->title = "Recent History";
                $this->masterPage = "RecentlyViewed";
                break;
        }
    }
}
