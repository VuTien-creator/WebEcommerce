<?php

namespace App\Http\Livewire\Customer\Page;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Shop extends Component
{
    use WithPagination;

    protected $products;

    public $sort = 'name';

    public $search = '';
    // protected $latestProducts;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

        if ($this->sort == 1) {
            $this->sort = 'name';
        } elseif ($this->sort == 2) {
            $this->sort = 'price';
        }

        $obj = new Product;

        $this->latestProducts = $obj->customerGetLatestProduct();

        $this->latestProducts->toArray();
    }

    public function render()
    {
        return view('livewire.customer.page.shop', [
            'products' => Product::query()
                ->CustomerSearch($this->search)->where('status', 1)->orderBy('product_type_id')->paginate(15),
            // 'products' =>Product::customerGetAllProduct()
            // 'latestProducts'=>$this->latestProducts,
        ])->layout('customer.layout');
    }

    public function sortBy($column)
    {
        dd('here');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
