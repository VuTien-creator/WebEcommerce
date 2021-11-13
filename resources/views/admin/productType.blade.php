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
                        <h4 class="header-title">Product Types</h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Product Type Name</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                        <th>Created At:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($productTypes->count() != 0)
                                    @foreach ($productTypes as $type)
                                        <tr>
                                            <td> <a
                                                    href="{{ route('admin.getProductByType', $type->id) }}">{{ $type->name }}</a>
                                            </td>
                                            <td>{{ $type->status == 1 ? 'Active' : 'Block' }}</td>

                                            @if (!empty($type->user->name))
                                                <td>{{ $type->user->name }}</td>
                                            @else
                                                <td>Default Product </td>
                                            @endif

                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a
                                                            href="{{ route('product-type.edit', $type->id) }}"
                                                            class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                    <form method="POST"
                                                        action="{{ route('product-type.destroy', $type->id) }}"
                                                        onsubmit="return confirm('Are You sure? It will IRREVERSIBLY delete all product records of that Product Type.')"
                                                        >
                                                        @csrf
                                                        @method("DELETE")
                                                        <li>
                                                            {{-- <a class=" text-danger"
                                                                href="{{ route('product-type.destroy', $type->id) }}"
                                                                onsubmit="event.preventDefault(); this.closest('form').submit(); " role="button"
                                                                onclick="return confirm('Are You sure? It will IRREVERSIBLY delete all product records of that Product Type.')"
                                                                >
                                                                <i class="ti-trash"></i>
                                                            </a> --}}
                                                            <input type="submit" class="btn btn-xs btn-danger" value="delete">
                                                        </li>
                                                    </form>
                                                </ul>
                                            </td>
                                            <td>{{ date_format($type->created_at, 'd-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>Don't have any product Type</td>
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
