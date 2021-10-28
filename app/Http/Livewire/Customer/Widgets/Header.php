<?php

namespace App\Http\Livewire\Customer\Widgets;

use App\Models\ProductType;
use Livewire\Component;

class Header extends Component
{
    public $categories;

    public function mount(){
        $obj = new ProductType;
        $this->categories = $obj->customerGetCategories();
    }
    
    public function render()
    {
        return view('livewire.customer.widgets.header');
    }
}
