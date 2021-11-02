<?php

namespace App\Http\Livewire\Customer\Page;

use App\Facades\Cart as AppFacadesCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    protected $cart;
    protected $cartSubTotal;

    public $message = [];
    public function mount()
    {

        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.customer.page.cart', [
            'cart' => $this->cart,
            'cartSubTotal' => $this->cartSubTotal
        ])
            ->layout('customer.layout');
    }

    public function updateCart()
    {
        $this->cartSubTotal = AppFacadesCart::total();
        $this->cart = AppFacadesCart::content();

        foreach ($this->cart as $id => $product) {
            $product['image'] = Product::query()->CustomerGetImageById($id);
        }
    }

    public function removeFromCart(string $id): void
    {
        // dd($id);
        AppFacadesCart::remove($id);
        $this->updateCart();
        $this->emit('cartCounter');
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
        $cart = AppFacadesCart::content();
        //check product in cart
        try {
            $product = Product::select('id', 'quantity')
                ->where('id', $id)
                ->pluck('quantity', 'id');
        } catch (\Exception $e) {
            $this->message = 'Product not found in your cart';
        }

        $quantity = $cart[$id]['quantity'];

        switch ($action) {
            case 'plus':
                $quantity += 1;
                break;
            case 'minus':
                $quantity -= 1;
                break;
        }
        //check item's quantity with quantity in stock
        if ($product[$id] < $quantity) {
            $this->message[$id] = "Item's quantity greater quantity in stock";
            $this->updateCart();

        } else {
            // dd(1);
            AppFacadesCart::update($id, $action);

            $this->updateCart();
            $this->emit('cartCounter');
        }
    }
}
