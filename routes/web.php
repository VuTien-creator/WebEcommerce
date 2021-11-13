<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Livewire\Customer\Page\Cart;
use App\Http\Livewire\Customer\Page\Checkout;
use App\Http\Livewire\Customer\Page\Index;
use App\Http\Livewire\Customer\Page\ProductDetail;
use App\Http\Livewire\Customer\Page\Shop;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',Index::class)->name('customer.index');

Route::get('/shop',Shop::class)->name('customer.shop');

Route::get('/product-detail-{id}',ProductDetail::class)->name('customer.productDetail');

Route::get('/cart',Cart::class)->name('customer.cart');



Route::middleware(['auth'])->group(function () {

    Route::get('/checkout',Checkout::class)->name('customer.checkout');


    //Admin role
    Route::group(['middleware'=>'admin','prefix'=>'admin'],function () {

        Route::get('index',[AdminController::class,'index'])->name('admin.index');

        //product
        //get product by product_type_id
            Route::get('product-of-type-{id}',[AdminController::class,'getProductByTypeId'])->name('admin.getProductByType');

        Route::resource('product', ProductController::class);

        //product type

        Route::resource('product-type', ProductTypeController::class);

        //management
        Route::get('management',[AdminController::class,'manage'])->name('admin.manage');
        Route::get('bill-detail-{id}',[AdminController::class,'billDetail'])->name('admin.billDetail');

    });
});
