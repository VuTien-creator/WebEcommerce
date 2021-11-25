<?php

namespace App\Http\Livewire\Customer\Page;

use App\Facades\Cart;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
                    'total_price' => Cart::total(),
                    'path_qr_code' => '',
                ]);

                foreach ($cart as $id => $cartProduct) {
                    $bill->products()->attach($id, [
                        'quantity' => $cartProduct['quantity'],
                        'price' => $cartProduct['price']
                    ]);

                    // $product = Product::where('id',$id)->get();
                    // $product->quantity -= $cartProduct['quantity'];
                    // $product->quantity_product_sold += $cartProduct['quantity'];
                    Product::find($id)->decrement('quantity', $cartProduct['quantity']);
                    Product::find($id)->increment('quantity_product_sold',$cartProduct['quantity']);
                }

                $path = 'QRcode/'.time().'.svg';
                $bill->path_qr_code = $path;
                $bill->update();
                
                $data = 'http://127.0.0.1:8000/bill-detail-'.$bill->id;

                QrCode::size(250)->generate($data,'../public/'.$path);

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
            // dd($e->getMessage());
        }
    }
}