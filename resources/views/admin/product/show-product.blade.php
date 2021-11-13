@extends('admin.layout')
@section('admin')
<div class="main-content-inner">
    <div class="row">
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
                    <div class="header-title">Product Detail</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="grid-col">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-desc" style="padding-top: 30px;">
                                <h3
                                    class="product-desc__header"
                                    style="
                                        font-size: 26px;
                                        font-weight: 500;
                                        margin-bottom: 20px;"
                                    >
                                    {{ $product->name }}
                                </h3>
                                <div class="product-desc__price mar-btm-20" style="
                                    display: flex;
                                    height: 30px;
                                    line-height: 30px;
                                    align-items: baseline;
                                    overflow: hidden;
                                    white-space: nowrap;
                                    text-overflow: ellipsis;
                                    align-items: center;
                                    margin-bottom: 20px;
                                ">
                                    <div class="product-desc__price-current" style="font-size: 32px;color: #8063f5;margin-right: 10px">{{ number_format($product->price) }} VND</div>
                                    <button type="button" class="product-desc__price-discount btn btn-{{ $product->status == 1 ? 'primary':'dark'  }} btn-xs" >{{ $product->status == 1? 'Active':'Block' }}</button>
                                </div>

                                <div class="product-optioncolor mar-btm-20" style="display: flex;align-items: center;margin-bottom: 20px">
                                    <span class="product-optioncolor__name" style="display: block;font-size: 18px;color: #000;margin-right: 30px;font-weight: bold;">Product's Type:</span>
                                    <span
                                        class="product-optioncolor__option"
                                        style="
                                            font-size: 18px;
                                            color: #000;
                                        ">
                                        {{ $product->productType->name }}
                                    </span>
                                </div>

                                <div class="product-desc__quantity mar-btm-20" style="margin-bottom: 20px;">
                                    <form action="#" class="product-desc__quantit-form mar-btm-20" style="margin-bottom: 20px;display: block;">
                                        <span class="product-desc__quantit-form-item" style="font-size: 18px;color: #000;padding-right: 30px;font-weight: bold;">Quantity In Stock:</span>
                                        <span
                                        class="product-optioncolor__option"
                                        style="
                                            font-size: 18px;
                                            color: #000;
                                            margin-right: 22px;
                                        ">
                                        {{ $product->quantity }}
                                    </span>
                                        <span class="product-desc__quantit-form-item" style="font-size: 18px;color: var(--text-color);padding-right: 30px;font-weight: 300;opacity: 0.9"></span>
                                    </form>
                                </div>
                                <div class="product-desc__quantity mar-btm-20" style="margin-bottom: 20px;">
                                    <form action="#" class="product-desc__quantit-form mar-btm-20" style="margin-bottom: 20px;display: block;">
                                        <span class="product-desc__quantit-form-item" style="font-size: 18px;color: #000;padding-right: 30px;font-weight: bold;">Quantity Sold:</span>
                                        <span
                                        class="product-optioncolor__option"
                                        style="
                                            font-size: 18px;
                                            color: #000;
                                            margin-right: 22px;
                                        ">
                                        {{ $product->quantity_product_sold }}
                                    </span>
                                        <span class="product-desc__quantit-form-item" style="font-size: 18px;color: var(--text-color);padding-right: 30px;font-weight: 300;opacity: 0.9"></span>
                                    </form>
                                </div>
                                <div class="product-desc__socila-sharing" style="display: flex;margin-bottom: 20px">
                                    <span class="product-optioncolor__name" style="display: block;font-size: 18px;color: #000;margin-right: 30px;font-weight: bold;">Description:</span>
                                    <span
                                        class="product-optioncolor__option"
                                        style="
                                            font-size: 18px;
                                            color: #000;
                                        ">
                                        {{ $product->description }}
                                    </span>
                                </div>

                                <div class="product-desc__actions">
                                    <a href="{{ route('product.edit',$product->id) }}" type="button" class="btn btn-primary btn-lg mb-3" style="font-size: 16px;">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>

    </script>
@endsection
