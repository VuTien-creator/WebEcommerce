<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$productTypes = ProductType::adminGetAllProductType();
		return view('admin.productType', [
			'productTypes' => $productTypes,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view('admin.form-new-type');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$data = $request->validate([
			'name' => 'required',
			'status' => 'required|numeric|min:0|max:1',
		]);

		$productType = Auth::user()->productType()->create($data);

		return redirect()->route('product-type.index')->with([
			'message' => "Create Product Type " . $productType->name . " Successfully",
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		$productType = ProductType::findOrFail($id);

		return view('admin.form-edit-product-type', [
			'productType' => $productType,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ProductType $productType) {
		//
		$data = $request->validate([
			'name' => 'required',
			'status' => 'required|numeric|min:0|max:1',
		]);
		$productType->update($data);

		return redirect()->route('product-type.index')->with([
			'message' => 'Update Product Type Successfully',
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
        $productType = ProductType::findOrFail($id);
        
		$productType->delete();

		return redirect()->route('product-type.index')->with([
			'message' => 'Delete Product Type Successfully',
		]);
	}
}
