<?php

namespace App\Http\Livewire\Customer\Page;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class ProductDetail extends Component
{
    public $product;

    public $relatedProduct;

    public int $quantity = 1;

    public $show = false;

    protected $listeners = ['saved'=>'wrongQuantity'];

    public function mount($id)
    {

        $obj = new Product;

        $this->product = $obj->customerGetProductById($id);

        $this->relatedProducts = $obj->customerGetRelateProduct($this->product->product_type_id);

    }

    public function render()
    {
        return view('livewire.customer.page.product-detail')
            ->layout('customer.layout');
    }

    public function wrongQuantity(){
        $this->show = true;
    }

    public function addToCart()
    {

        if (
            empty($this->quantity)
            || $this->quantity <= 0
            || !is_numeric($this->quantity)
        ) {
            $this->message = 'Please fill correct quantity (quantity is number and greater 0)!';
            $this->show = true;
        }

        //check quantity with stock

        elseif(($this->product->quantity < $this->quantity && $this->quantity > 0)){
            $this->message = "Item's quantity more than quantity in stock";
            $this->show = true;

        }else{
            $this->show = false;
            Cart::add(
                $this->product->id,
                $this->product->name,
                $this->product->price,
                $this->quantity
            );
            $this->emit('cartCounter');
        }
    }

    public function updateQuantity($action)
    {
        switch ($action) {
            case 'plus':
                $this->quantity += 1;
                break;
            case 'minus':
                if($this->quantity >= 2){
                    $this->quantity -= 1;
                }
                break;
        }
    }
}
