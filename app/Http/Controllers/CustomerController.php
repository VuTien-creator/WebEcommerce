<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function historyOrder(){
        $data = Bill::select(
            'path_qr_code',
            'total_price',
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as date")
        )
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at','desc')
        ->get()
        ->map(function ($bill){
            // $data = [];
            $data = [
                'path' => $bill->path_qr_code,
                'date' => $bill->date,
                'total_price' => $bill->total_price,
            ];
            return $data;
        });


        return view('customer.history')->with([
            'data' => $data
        ]);
    }

    public function billDetail($id){

        $bill = new Bill;
        $billDetail = $bill->getBillDetail($id);

        if ($billDetail->isEmpty()) {
            return abort(404);
        }

        return view('customer.bill-detail', [
            'billDetail' => $billDetail,
        ]);
    }
}