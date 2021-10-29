<?php

namespace App\Http\Livewire\Customer\Page;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    private $cart;
    private $cartSubTotal;

    public function mount()
    {
        $test = Product::where('id',20)->first();
        FacadesCart::add($test->id, $test->name, 2,$test->price);
        $this->cartSubTotal = (int)FacadesCart::subTotal(0,0,0);

        $this->cart = FacadesCart::content();

        foreach ($this->cart as $product) {
            $product->image = Product::query()->CustomerGetImageById($product->id);
        }


    }

    public function render()
    {
        return view('livewire.customer.page.cart',[
            'cart' => $this->cart,
            'cartSubTotal' => $this->cartSubTotal
        ])
        ->layout('customer.layout');
    }
}
