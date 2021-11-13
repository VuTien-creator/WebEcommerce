@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Product {{ $product->name }}</h4>
                        <form action="{{ route('product.update',$product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product's Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product's Name"
                                    value="{{ old('name')?? $product->name }}">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Product's Type</label>
                                <select class="form-control" name="product_type_id">
                                    @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('product_type_id') == $type->id ? 'selected' : $product->product_type_id == $type->id ? 'selected':'' }}>
                                            {{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_type_id'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('product_type_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Product's Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" value="{{ old('image') }}" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Image</label>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="">
                                <input type="file" value="{{ old('image') }}" class="" name="image" id="image">
                                <label class="custom-file-label" for="inputGroupFile01">Image</label>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-form-label">Product's Price</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ old('price') ?? $product->price }}" id="price" name="price" min="1" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VND</span>
                                    </div>
                                </div>
                                @if ($errors->has('price'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Product's Quantity In Stock</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ old('quantity')??$product->quantity }}" id="quantity" name="quantity" min="0" aria-label="Amount (to the nearest dollar)">

                                </div>
                                @if ($errors->has('quantity'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : $product->status == 1 ? 'selected':'' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : $product->status !=1 ? 'selected':'' }}>Block</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product's Description</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                    <textarea class="form-control" name="description" id="description" aria-label="With textarea">{{ old('description')??$product->description }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic form end -->
        </div>
    </div>

    <script>

    </script>
@endsection
