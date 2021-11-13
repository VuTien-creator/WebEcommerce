<?php

namespace App\Http\Livewire\Customer\Widgets;

use App\Models\ProductType;
use Livewire\Component;

class Search extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.customer.widgets.search');
    }

    public function mount(){
        $obj = new ProductType;
        $this->categories = $obj->customerGetCategories();

    }
}
