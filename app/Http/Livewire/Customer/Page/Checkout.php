<?php

namespace App\Http\Livewire\Customer\Page;

use App\Facades\Cart;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{
    public $message = '';

    protected $cart;

    protected $cartSubTotal;


    public function mount(){
        $this->cart();
    }

    public function render()
    {
        return view('livewire.customer.page.checkout',[
            'cart' => $this->cart,
            'subTotal' => $this->cartSubTotal
        ])->layout('customer.layout');
    }


    public function Cart(){
        $this->cart = Cart::content();
        $this->cartSubTotal = Cart::total();

        $this->cart->count() <= 0 ? $this->message = 'Gio Hang Trong':'';

    }

    public function checkout()
    {
        $cart = Cart::content();

        $products = Product::select('id', 'quantity')
            ->whereIn('id', $cart->pluck('id'))
            ->pluck('quantity', 'id');

        foreach ($cart as $id => $cartProduct) {
            if (
                !isset($products[$id])
                || $products[$id] < $cartProduct['quantity']
            ) {
                $this->message = 'Error: product' . $cartProduct['name'] . 'not found';
            }
        }

        try {
            DB::transaction(function () use ($cart) {
                $bill = Bill::create([
                    'user_id' => auth()->id(),
                    'total_price' => Cart::total()
                ]);

                foreach ($cart as $id => $cartProduct) {
                    $bill->products()->attach($id, [
                        'quantity' => $cartProduct['quantity'],
                        'price' => $cartProduct['price']
                    ]);

                    Product::find($id)->decrement('quantity', $cartProduct['quantity']);
                }

                Cart::clear();

                //update view
                $this->cart();

                $this->emit('cartCounter');

                //message
                $this->message = 'Order successfully';
            });
            //create Bill
        } catch (\Exception $e) {
            //throw $th;
            $this->message = 'something wrong, try again or contact us';
            dd($e->getMessage());
        }
    }
}
