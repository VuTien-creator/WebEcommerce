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

    public $message = '';
    public function mount()
    {

        // $cartSubTotal =str_replace( ',', '',FacadesCart::subTotal(0));

        // $this->cartSubTotal = (int)$cartSubTotal ;


        // $this->cart = FacadesCart::content();

        // foreach ($this->cart as $product) {
        //     $product->image = Product::query()->CustomerGetImageById($product->id);
        // }

        $this->updateCart();

    }

    public function render()
    {
        return view('livewire.customer.page.cart',[
            'cart' => $this->cart,
            'cartSubTotal' => $this->cartSubTotal
        ])
        ->layout('customer.layout');
    }

    public function updateCart(){
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
        AppFacadesCart::update($id, $action);
        $this->updateCart();
        $this->emit('cartCounter');
    }
}
