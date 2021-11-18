@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Best Sale</h4>
                        </div>
                        {{-- <div id="ambarchart2" data-chart="{{ $data }}"></div> --}}
                        <div>
                            <canvas id="myChart" data-chart="{{ $data }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
