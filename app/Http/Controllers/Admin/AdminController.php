<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Bill;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function index()
    {
        $manage = Product::orderBy('quantity_product_sold', 'desc')->take(16)->get()
            ->map(function ($product) {
                $data = [];
                $data[$product->name] = $product->quantity_product_sold;
                return $data;
            })->collapse();
        $data = [];
        foreach ($manage as $name => $sold) {

            if ($sold > 50) {
                $color = 'rgb(255, 99, 132)';
            } else {
                $color = '#7474f0';
            }

            $data[] = [
                'name' => $name,
                'sold' => $sold,
                'color' => $color
            ];
        }
        // dd($manage);
        return view('admin.index', [
            'data' => json_encode($data),
        ]);
    }

    //product
    public function product()
    {
        $products = Product::adminGetAllProduct();
        return view('admin.product', [
            'products' => $products,
        ]);
    }

    public function formEditProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('test', [
            'test' => $product,
        ]);
    }

    public function editProduct($id, ProductRequest $request)
    {
        // public function editProduct(Product $product, ProductRequest $request){
        $product = Product::findOrFail($id);

        if ($product->update($request->all())) {
            return true;
        }
        return false;
    }

    // product Type

    public function getProductByTypeId($id)
    {
        // dd(Product::where('product_type_id',$id)->get());
        $products = Product::adminGetProductByTypeId($id);

        return view('admin.product', [
            'products' => $products,
        ]);
    }

    //admin management
    public function manage()
    {

        $bills = Bill::adminGetAllBill();
        // dd($bills);
        return view('admin.manage', [
            'bills' => $bills,
        ]);
    }

    public function billDetail($id)
    {
        $bill = new Bill;
        $billDetail = $bill->getBillDetail($id);

        return view('admin.bill-detail', [
            'billDetail' => $billDetail,
        ]);
    }
}
