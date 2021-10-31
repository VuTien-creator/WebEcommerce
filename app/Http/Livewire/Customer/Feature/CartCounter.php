<?php

namespace App\Http\Livewire\Customer\Feature;

use Livewire\Component;

use App\Facades\Cart as FacadeCart;
class CartCounter extends Component
{
    protected $cartSubTotal;

    protected $countItem;

    protected $listeners = ['cartCounter' =>'updateCart'];

    public function mount(){
        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.customer.feature.cart-counter',[
            'cartSubTotal' => $this->cartSubTotal,
            'countItem'=>$this->countItem
        ]);
    }

    public function updateCart(){
        $this->cartSubTotal = FacadeCart::total();
        $this->countItem = FacadeCart::content()->count();
    }

}
