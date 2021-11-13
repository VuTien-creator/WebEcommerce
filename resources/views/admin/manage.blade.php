@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Receipt</h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Price</th>
                                        <th>Created At:</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($bills->count() != 0)
                                        @foreach ($bills as $bill)
                                            <tr>
                                                <td>{{ $bill->name }}</td>
                                                <td>{{ number_format((int)$bill->total_price) }} VND</td>
                                                <td>{{ date('d-m-Y',strtotime($bill->created_at)) }}</td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3 "><a href="{{ route('admin.billDetail',$bill->id) }}"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Don't have any receipt</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>
    </div>
@endsection
