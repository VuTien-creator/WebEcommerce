<?php

namespace App\Http\Livewire\Customer\Page;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product ;

    public $relatedProduct ;

    public function mount($id){

        $obj = new Product;

        $this->product = $obj->customerGetProductById($id);

        $this->relatedProducts = $obj->customerGetRelateProduct($this->product->product_type_id);
    }

    public function render()
    {
        return view('livewire.customer.page.product-detail')
        ->layout('customer.layout');
    }
}
