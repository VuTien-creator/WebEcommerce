<?php

namespace App\Http\Livewire\Customer\Feature;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $cartSubTotal;

    protected $countItem;

    protected $listeners = ['cartCounter' =>'mount'];

    public function mount(){
        $cartSubTotal =str_replace( ',', '',Cart::subTotal(0));

        $this->cartSubTotal = (int)$cartSubTotal ;

        $this->countItem = Cart::content()->count();
    }

    public function render()
    {
        return view('livewire.customer.feature.cart-counter',[
            'cartSubTotal' => $this->cartSubTotal,
            'countItem'=>$this->countItem
        ]);
    }
}
