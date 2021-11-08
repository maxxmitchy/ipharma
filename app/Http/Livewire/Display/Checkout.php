<?php

namespace App\Http\Livewire\Display;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Facades\Cart as CartFacade;
use App\Models\PaymentGateway;

class Checkout extends Component
{
    public $address = null;
    public $payment = "cod";
    public $points;
    public $coupon;
    public $nodiscount = true;
    public $subtotal;

    public function mount()
    {
        $this->address = User::defaultAddress();
        if(CartFacade::content()->count() < 1) {
            return redirect('/cart');
        }

        $this->subtotal = CartFacade::total();
    }

    public function render()
    {
        $productsImages = CartFacade::content()->map(function($item){
            return Str::after(Product::find($item['id'])->getFirstMedia('main')->getUrl(), 'http://localhost/');
        });
        return view('livewire.display.checkout', [
                        'defaultAddress' => $this->address,
                        'images' => $productsImages,
                        'subtotal' => $this->subtotal
                        ])->layout('layouts.guest');
    }

    public function order()
    {
        $this->validate(['address' => 'required']);

        Order::create([
            'user_id' => auth()->id(),
            'payment_gateway_id' => PaymentGateway::where('name', $this->payment)->first()->id,
            'name' => $this->address->name,
            'address' => 'Room ## - ' . $this->address->house . ', ' .  $this->address->street . ' Street, ' . $this->address->city . ' - ' . $this->address->state,
            'state' => $this->address->state,
            'city' => $this->address->city,
            'phone' => $this->address->phone,
            'email' => auth()->user()->email,
            'grand_total' => $this->subtotal,
        ]);

        // add cart items to order_items table
        CartFacade::storeOrder();

        return redirect('/dashboard');
    }

    public function toggle($case)
    {
        switch ($case) {
            case 'points':
                $this->points = true;
                $this->nodiscount = false;
                break;
            case 'coupon':
                $this->coupon = true;
                $this->nodiscount = false;
                break;
            case 'nodiscount':
                $this->nodiscount = true;
                $this->points = $this->coupon = false;
                break;
        }
    }
}
