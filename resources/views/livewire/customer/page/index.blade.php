<div>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categories as $item)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('client') }}/img/categories/cat-1.jpg">
                            <h5><a href="/#">{{ $item->name }}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Products</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($latestProducts as $product)
                {{-- {{ dd($product) }} --}}
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic">
                            <a href="{{ route('customer.productDetail',$product->id) }}">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            </a>
                            <ul class="featured__item__pic__hover">
                            <livewire:customer.feature.add-to-cart :product="$product">
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('customer.productDetail',$product->id) }}">{{ $product->name }}</a></h6>
                            <h5>{{ number_format($product->price) }} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('client') }}/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('client') }}/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Laptop Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Smart Phone Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="{{ asset('client') }}/#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('client') }}/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
</div>
