<?php

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
