<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$products = Product::adminGetAllProduct();
		return view('admin.product', [
			'products' => $products,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		$productType = ProductType::get(['id', 'name']);
		return view('admin.product.form-create-new', [
			'productType' => $productType,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
        // dd(1);
		$data = $request->validate([
			'name' => 'required',
			'product_type_id' => 'required|numeric',
			'image' => 'required | image| max:4000 |mimes:jpg,png,jpeg',
			'price' => 'required|numeric|min:1',
			'status' => 'required',
			'description' => 'required',
			'quantity' => 'required|numeric|min:0',
		]);

        $data['quantity_product_sold'] = 0;
		// delete index image in $data
		unset($data['image']);

		//get path of image
		$name = time() . '-' . $request->file('image')->getClientOriginalName();
		$request->file('image')->move('product/images/', $name);

		$path = 'product/images/' . $name;
		$data['image'] = $path;
		try {

			$product = Product::create($data);
			// DB::transaction( function () use ($data){
			//     $product = Product::create($data);

			//     return $product;

			// }) ;

		} catch (\Exception $e) {
            // dd($e->getMessage());
			return redirect()->back()->withError([
				'message' => 'somthing Wrong, try again or contact with us !',
			]);
		}
        // dd($product);

		return redirect()->route('product.show', $product->id)->with([
			'message' => 'Create Product Successfully',
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$product = Product::findOrFail($id);

		return view('admin.product.show-product', [
			'product' => $product,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		$product = Product::findOrFail($id);
		$productTypes = ProductType::get(['id', 'name']);
		return view('admin.product.form-edit', [
			'product' => $product,
			'productTypes' => $productTypes,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product) {
		//

		$data = $request->validate([
			'name' => 'required',
			'product_type_id' => 'required|numeric',
			'image' => 'image| max:4000 |mimes:jpg,png,jpeg',
			'price' => 'required|numeric|min:1',
			'status' => 'required',
			'description' => 'required',
			'quantity' => 'required|numeric|min:0',
		]);

        if($request->file('image')){
            // delete index image in $data
            unset($data['image']);

            //get path of image
            $name = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('product/images/', $name);

            $path = 'product/images/' . $name;
            $data['image'] = $path;
        }else{
            $data['image'] = $product->image;
        }


		$product->update($data);

		return redirect()->route('product.show', $product->id)->with([
			'message' => 'Update Product Successfully',
		]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
        // dd($id);
        $product = Product::findOrFail($id);
		$product->delete();

		return redirect()->route('product.index')->with([
			'message' => 'Delete Product Successfully',
		]);
	}
}
