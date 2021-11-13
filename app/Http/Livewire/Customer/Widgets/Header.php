<?php

namespace App\Http\Livewire\Customer\Widgets;

use App\Models\ProductType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Header extends Component
{
    // public $categories;

    public int $cartSubTotal;

    public int $countItem;

    public function mount(){
        // $obj = new ProductType;
        // $this->categories = $obj->customerGetCategories();

        $cartSubTotal =str_replace( ',', '',Cart::subTotal(0));

        $this->cartSubTotal = (int)$cartSubTotal ;

        $this->countItem = Cart::content()->count();
    }

    public function render()
    {
        return view('livewire.customer.widgets.header');
    }
}
