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
                        <h4 class="header-title">Products</h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Type</th>
                                        <th>Price</th>
                                        <th>Quantity In Stock</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Create At:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count() != 0)
                                        @foreach ($products as $product)
                                            <tr>
                                                <td> <a
                                                        href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                                </td>
                                                <td><a
                                                        href="{{ Request::path() == 'admin/product' ? route('admin.getProductByType', $product->product_type_id) : 'edit' }}">{{ $product->product_type_name }}</a>
                                                </td>
                                                <td>{{ number_format((int) $product->price) }} VND</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->status == 1 ? 'Active' : 'Block' }}</td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a
                                                                href="{{ route('product.edit', $product->id) }}"
                                                                class="text-secondary"><i class="fa fa-edit"></i></a>
                                                        </li>

                                                        {{-- <li><a href="#" class="text-danger"
                                                                onclick="return confirm('Are You sure? Product will be DELETE.')"><i
                                                                    class="ti-trash"></i></a></li> --}}
                                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                                            onsubmit="return confirm('Are You sure? Product will be DELETE.')"
                                                            >
                                                            @csrf
                                                            @method("DELETE")
                                                            <li>
                                                                {{-- <a class=" text-danger"
                                                                    href="{{ route('product.destroy', $product->id) }}"
                                                                    onsubmit="event.preventDefault(); this.closest('form').submit(); " role="button"
                                                                    onclick="return confirm('Are You sure? Product will be DELETE.')"
                                                                    >
                                                                    <i class="ti-trash"></i>
                                                                </a> --}}
                                                                <input type="submit" class="btn btn-xs btn-danger" value="delete">
                                                            </li>
                                                        </form>
                                                    </ul>
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($product->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Don't have any product in this product type</td>
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
