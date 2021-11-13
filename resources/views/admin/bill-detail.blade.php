@extends('admin.layout')
@section('admin')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-6">
                                    <span>BILL DETAIL</span>
                                </div>
                                <div class="iv-right col-6 text-md-right">
                                    {{-- <span>#34445998</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>Customer Name: {{ $billDetail[0]->customer_name }}</h3>
                                    <h5>Email: {{ $billDetail[0]->customer_email }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Buy At : {{ date('d-m-Y',strtotime($billDetail[0]->bill_created)) }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover text-right">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center" style="width: 5%;"></th>
                                        <th class="text-left" style="width: 45%; min-width: 130px;">Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th style="min-width: 100px">Product Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billDetail as $item)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-left">{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->product_price) }} VND</td>
                                        <td>{{ number_format($item->product_price*$item->quantity) }} VND</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Total Bill :</td>
                                        <td>{{ number_format($billDetail[0]->bill_total) }} VND</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <a href="{{ route('admin.manage') }}" class="invoice-btn">Back</a>
                        <a href="{{ route('admin.index') }}" class="invoice-btn">Back To Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
