@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="header-title">All Admin</h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Create At:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($admin->count() != 0)
                                        @foreach ($admin as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ date('d-m-Y', strtotime($admin->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Don't have any admin account</td>
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
