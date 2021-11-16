<?php

namespace App\Http\Livewire\Display;

use Exception;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Facades\Cart as CartFacade;
use App\Services\PaymentGateWayInterface;
use Illuminate\Validation\ValidationException;

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

    protected $listeners = [
        'addressAdded' => 'updateAddress',
    ];

    public function updateAddress()
    {
        $this->mount();

        $this->render();

        $this->emit('closeModal');

        $this->notify('Address added successfully.');
    }

    public function render()
    {
        $productsImages = CartFacade::content()->map(function($item){
            return Str::after(Product::find($item['id'])->getFirstMedia('main')->getUrl(), env('APP_URL'));
        });
        return view('livewire.display.checkout', [
                        'defaultAddress' => $this->address,
                        'images' => $productsImages,
                        'subtotal' => $this->subtotal
                        ])->layout('layouts.guest');
    }

    public function order(PaymentGateWayInterface $paymentGateWayInterface)
    {
        $this->validate(['address' => 'required']);

        CartFacade::createOrder($this);

        CartFacade::storeOrder();

        if($this->payment === "prepaid"){

            try {
                $paymentGateWayInterface->getAuthorizationUrl($this);
            } catch (Exception $e) {
                throw ValidationException::withMessages([
                    'payment-error' => 'something went wrong, please try again'
                ]);
            }
        }else{
            return redirect('/dashboard');
        }
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
