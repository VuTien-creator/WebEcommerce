<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Livewire\Customer\Page\Cart;
use App\Http\Livewire\Customer\Page\Checkout;
use App\Http\Livewire\Customer\Page\Index;
use App\Http\Livewire\Customer\Page\ProductDetail;
use App\Http\Livewire\Customer\Page\Shop;
use Illuminate\Support\Facades\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


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


// Route::get('test', (function(){
//     return view('test');
// } ));


Route::middleware(['auth'])->group(function () {

    Route::get('bill-detail-{id}', [CustomerController::class, 'billDetail'])->name('customer.billDetail');

    Route::get('export-bill-detail-{id}',[CustomerController::class, 'exportBill'])->name('export.billDetail');

    Route::get('/checkout',Checkout::class)->name('customer.checkout');

    Route::get('history-order',[CustomerController::class,'historyOrder'])->name('customer.historyOrder');

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

        Route::get('create-new-admin',[AdminController::class,'formNewAdmin'])->name('admin.formNewAdmin');
        Route::post('create-new-admin',[AdminController::class,'storeNewAdmin'])->name('admin.storeNewAdmin');

        Route::get('manage-customer-account',[AdminController::class,'manageCustomer'])->name('admin.manageCustomer');
        Route::get('manage-admin-account',[AdminController::class,'manageAdmin'])->name('admin.manageAdmin');

        //management bill

        Route::post('management-bill',[AdminController::class,'manageBill'])->name('admin.manageBill');

        Route::post('download-excel',[AdminController::class,'export'])->name('admin.export');

        Route::get('qr-code',[AdminController::class, 'QRcode'])->name('admin.qrcode');


    });
});