@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-3 mt-5">

            </div>
            <!-- basic form start -->
            <div class="col-6 mt-5">
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
                        <h4 class="header-title">Create New Admin's Account</h4>
                        <form action="{{ route('admin.storeNewAdmin') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Admin's Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Admin's Name"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="" name="email" placeholder="Admin's Email"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="" name="password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirmed Password</label>
                                <input type="password" class="form-control" id="" name="password_confirmation" >
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
            <div class="col-3 mt-5">

            </div>
        </div>
    </div>
@endsection
