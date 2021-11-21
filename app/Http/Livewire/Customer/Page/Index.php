<?php

namespace App\Http\Livewire\Customer\Page;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

class Index extends Component
{
    public $categories;

    public $latestProducts;

    public $bestSalerProducts;

    public function mount(){
        $obj = new ProductType;
        $products = new Product;
        $this->latestProducts = $products->customerGetLatestProduct();
        // $this->categories = $obj->customerGetCategories();
        $this->bestSalerProducts = $products->where('status',1)->orderBy('quantity_product_sold', 'desc')->take(8)->get();
    }

    public function render()
    {
        return view('livewire.customer.page.index')
        ->layout('customer.layout');
    }
}
