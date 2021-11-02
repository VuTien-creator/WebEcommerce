<?php

namespace App\Http\Livewire\Customer\Feature;

use App\Facades\Cart as FacadesCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{

    public  $product;
    public array $quantity = [];
    public int $qty = 1;

    public function mount($product)
    {

        $this->product = $product;

        // $this->qty = $qty;

        $this->quantity[$product->id] = $this->qty;
    }
    public function render()
    {
        return view('livewire.customer.feature.add-to-cart');
    }

    public function addToCart()
    {
        $product = Product::findOrFail($this->product->id);

        if (
            empty($this->quantity[$this->product->id])
            || $this->quantity[$this->product->id] <= 0
            || !is_numeric($this->quantity)
        ) {
            $this->quantity[$this->product->id] = 1;
        }

        FacadesCart::add(
            $this->product->id,
            $this->product->name,
            $this->product->price,
            $this->quantity[$this->product->id]
        );

        $this->emit('cartCounter');
    }
}
