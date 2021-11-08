<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Usernotnull\Toast\Concerns\WireToast;
use App\Models\WishList as ModelsWishList;

class WishList extends Component
{
    use WireToast;

    public $product;

    public $isAvailable;

    public function render()
    {
        return view('livewire.wish-list');
    }

    public function addToWishList()
    {
        if(Auth::check()){
            $this->isAvailable = true;
            dd(auth()->user()->wishes()->get());
            ModelsWishList::create([
                'user_id' => auth()->id(),
                'product_id' => $this->product
            ]);

            toast()
                ->success('Product added to favourites.')
                ->push();
        } else {
            return redirect('/login');
        }
    }
}
