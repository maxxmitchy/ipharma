<?php

namespace App\Http\Livewire\Display;

use Livewire\Component;
use App\Facades\Cart as CartFacade;
use Illuminate\Contracts\View\View;
use Usernotnull\Toast\Concerns\WireToast;

class Cart extends Component
{
    use WireToast;

    protected $total;

    protected $content;

    public $selected = [];

    public $showDeleteAndWishListButton = false;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    // public function mount(): void
    // {
    //     $this->updateCart();
    // }

    /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */

    protected $rules = [
        'selected' => 'required',
    ];


    protected $messages = [
        'selected.required' => 'Please select an item to continue.',
    ];

    public function render(): View
    {
        $this->updateCart();

        return view('livewire.display.cart', [
            'total' => $this->total,
            'content' => $this->content,
        ])->layout('layouts.guest');
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        CartFacade::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        CartFacade::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        CartFacade::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = CartFacade::total();
        $this->content = CartFacade::content();
    }

    public function deleteMany()
    {
        $this->validate();

        collect($this->selected)->each(function ($item, $key) {
            $this->removeFromCart($item);
            // if (/* condition */) {
            //     return false;
            // }
        });

        $this->updateCart();

        $this->showDeleteAndWishListButton = false;

        $this->notify('product(s) removed from cart.');

    }

}
