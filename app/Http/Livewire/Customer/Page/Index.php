<?php

namespace App\Http\Livewire\Customer\Page;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

class Index extends Component
{
    public $categories;

    public $latestProducts;

    public function mount(){
        $obj = new ProductType;
        $products = new Product;
        $this->latestProducts = $products->customerGetLatestProduct();
        $this->categories = $obj->customerGetCategories();
    }

    public function render()
    {
        return view('livewire.customer.page.index')
        ->layout('customer.layout');
    }
}
