<?php

namespace App\Http\Controllers;

use App\Exports\ExportBill;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class CustomerController extends Controller
{
    //
    public function historyOrder(){
        $data = Bill::select(
            'path_qr_code',
            'total_price',
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as date"),
            'id'
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
                'id' => $bill->id,
            ];
            return $data;
        });

        return view('customer.history')->with([
            'data' => $data
        ]);
    }

    public function billDetail($id){

        $billDetail = $this->getBillDetail($id);
        return view('customer.bill-detail', [
            'billDetail' => $billDetail,
        ]);
    }

    private function getBillDetail($id){
        $bill = new Bill;
        $billDetail = $bill->getBillDetail($id);

        if ($billDetail->isEmpty()) {
            return abort(404);
        }

        if (Auth::user()->role_id != 1 && Auth::user()->name != $billDetail[0]->customer_name) {
            return abort(401);
        }
        // dd($billDetail);

        return $billDetail;
    }

    public function exportBill($billId){

        $billDetail = $this->getBillDetail($billId);
        $billDetail = collect($billDetail);
        if(empty($billDetail[0]->path_qr_code)){
            $qrCode = 'qrcode/Donthave.png';
        }else{
            $qrCode = $billDetail[0]->path_qr_code;
        }

        $export = new ExportBill($billDetail,$qrCode);

        return Excel::download($export, 'Bill.xlsx');
    }
}
