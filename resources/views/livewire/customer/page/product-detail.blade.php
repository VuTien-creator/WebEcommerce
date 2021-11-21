<div>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__price">{{ number_format($product->price) }} VND</div>
                        <p>{{ $product->description }}</p>
                        <div class="product__details__quantity ">
                            <div class="quantity">
                                <div class="">
                                    {{-- <input  type="number" type="number" min="1" wire:model="quantity"> --}}
                                    <button
                                        class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                        wire:click="updateQuantity('minus')"> -
                                    </button>
                                    {{ $quantity }}
                                    <button
                                        class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                        wire:click="updateQuantity('plus')"> +
                                    </button>
                                </div>
                            </div>

                        </div>
                        <a style="cursor: -webkit-grab" wire:click='addToCart' class="primary-btn">ADD TO CARD</a>
                        @if ($show)
                        <div >
                            {{  $message }}
                        </div>
                        @endif
                        <ul>
                            <li><b>Sold</b> <span> <samp>{{ $product->quantity_product_sold }}</samp></span></li>
                            <li><b>Availability</b> <span>{!! $product->quantity <= 0 ? '<samp>Out of stock</samp>' : 'In Stock' !!}</span></li>
                            <li><b>Shipping</b> <span> <samp>Free pickup</samp></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($relatedProducts->count() > 4)
                    <div class="categories__slider owl-carousel">
                        @foreach ($relatedProducts as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <a href="{{ route('customer.productDetail', $product->id) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                        </a>
                                        <ul class="product__item__pic__hover">
                                            <livewire:customer.feature.add-to-cart :product='$product' :key="time().$product->id">
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ route('customer.productDetail', $product->id) }}">{{ $product->name }}</a>
                                        </h6>
                                        <h5>{{ number_format($product->price) }} VND</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    @foreach ($relatedProducts as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic ">
                                    <a href="{{ route('customer.productDetail', $product->id) }}">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                    </a>
                                    <ul class="product__item__pic__hover">
                                        <livewire:customer.feature.add-to-cart :product='$product' :key="time().$product->id">
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a
                                            href="{{ route('customer.productDetail', $product->id) }}">{{ $product->name }}</a>
                                        <h5>{{ number_format($product->price) }} VND</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
</div>
