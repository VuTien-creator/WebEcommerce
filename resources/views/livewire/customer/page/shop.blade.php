<div>


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg col-md">

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select class="" wire:model="sort">
                                        <option > select</option>
                                        <option value="1">Name</option>
                                        <option value="2">Price</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $products->total() }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 ">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <a href="{{ route('customer.productDetail',$product->id) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->image }}">
                                        </a>
                                        <ul class="product__item__pic__hover">
                                            <livewire:customer.feature.add-to-cart :product="$product">
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{ route('customer.productDetail',$product->id) }}">{{ $product->name }}</a></h6>
                                        <h5>{{ number_format($product->price) }} VND</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</div>
