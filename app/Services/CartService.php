<?php

namespace App\Services;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Discount;
use App\Models\OrdersItem;
use App\Models\PaymentGateway;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class CartService {

    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';

    protected $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Adds a new item to the cart.
     *
     * @param int $id
     * @param string $name
     * @param string $price
     * @param int $stock
     * @param string $sku
     * @param string $quantity
     * @param array $options
     * @return void
     */
    public function add($id, $quantity, $options = []): void
    {
        $product = Product::getProduct($id);

        $cartItem = $this->createCartItem(
            $id,
            $product['product_name'],
            $product['productattribute']['price'] - ($product['productattribute']['price'] * (!is_null(Discount::find($product['discount_id'])) ? Discount::find($product['discount_id'])->value : 0)),
            $product['productattribute']['stock'],
            $product['productattribute']['sku'],
            $product['category']['name'],
            $product['brand']['name'] ?? 'GOL',
            $quantity,
            $options
        );

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function update(string $id, string $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem = $content->get($id);

            switch ($action) {
                case 'plus':
                    $cartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                    break;
                case 'minus':
                    $updatedQuantity = $content->get($id)->get('quantity') - 1;

                    if ($updatedQuantity < self::MINIMUM_QUANTITY) {
                        $updatedQuantity = self::MINIMUM_QUANTITY;
                    }

                    $cartItem->put('quantity', $updatedQuantity);
                    break;
            }

            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }
    }

    /**
     * Removes an item from the cart.
     *
     * @param string $id
     * @return void
     */
    public function remove(string $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
    }

    /**
     * Adds cart items to the order_items table.
     *
     *
     */
    public function storeOrder()
    {
        $order = User::find(auth()->id())->orders()->latest()->first()->id;

        $this->getContent()->each(function($product) use($order){

            $currentProduct = Product::find($product['id'])->load('productattribute');

            $currentProduct->productattribute->update([
                'quantity' => $currentProduct->productattribute->quantity--
            ]);

            OrdersItem::create([

                'product_id' => $product['id'],

                'order_id' => $order,

                'product_name' => $product['name'],

                'price' => Product::find($product['id'])->load('productattribute')->productattribute->price,

                'quantity' => $product['quantity'],

            ]);

        });

        $this->clear();
    }

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    public function content(): Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([]) : $this->session->get(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns total price of the items in the cart.
     *
     * @return string
     */
    public function total(): string
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, $item) {
            return $total += $item->get('price') * $item->get('quantity');
        });

        return number_format($total, 2);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
    }

    /**
     * Creates a new cart item from given inputs.
     *
     * @param string $name
     * @param string $price
     * @param string $quantity
     * @param array $options
     * @return Illuminate\Support\Collection
     */
    protected function createCartItem(int $id,
        string $name, string $price, int $stock, string $sku, string $category, string $brand, int $quantity, array $options): Collection
    {
        $quantity = intval($quantity);

        if ($quantity < self::MINIMUM_QUANTITY) {
            $quantity = self::MINIMUM_QUANTITY;
        }

        return collect([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'sku' => $sku,
            'category' => $category,
            'brand' => $brand,
            'quantity' => $quantity,
            'options' => $options,
        ]);
    }

    public function createOrder($order)
    {
        Order::create([
            'user_id' => auth()->id(),
            'payment_gateway_id' => PaymentGateway::where('name', $order->payment)->first()->id,
            'name' => $order->address->name,
            'address' => 'Room ## - ' . $order->address->house . ', ' .  $order->address->street . ' Street, ' . $order->address->city . ' - ' . $order->address->state,
            'state' => $order->address->state,
            'city' => $order->address->city,
            'phone' => $order->address->phone,
            'email' => auth()->user()->email,
            'grand_total' => $order->subtotal,
        ]);
    }
}
