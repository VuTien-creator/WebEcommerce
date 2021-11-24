@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg mt-5">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Revenue Management</h4>
                        </div>

                        <div class="">
                            <form action="{{ route('admin.manageBill') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between mb-5">
                                    <div>
                                        <label for="startMonth">From:</label>
                                        <input type="month" id="" name="startMonth" value="{{ old('startMonth') }}">
                                        @if ($errors->has('startMonth'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('startMonth') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="month">To:</label>
                                        <input type="month" id="" name="endtMonth" value="{{ old('endtMonth') }}">
                                        @if ($errors->has('endtMonth'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('endtMonth') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="submit" style="height: '80px'" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div>
                            <canvas id="billChart" data-chart="{{ $bills }}"></canvas>
                            <form action="{{ route('admin.export') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $bills }}" name="data">
                                <button type="submit" class="btn btn-primary">Export</button>
                            </form>

                        </div>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Best Sale</h4>
                        </div>
                        <div>
                            <canvas id="myChart" data-chart="{{ $data }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
