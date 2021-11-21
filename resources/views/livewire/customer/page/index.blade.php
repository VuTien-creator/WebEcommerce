<div>
    <!-- Categories Section Begin -->
    {{-- <section class="categories">
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
    </section> --}}
    <!-- Categories Section End -->

    <!-- best saler Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Best Saler Products</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($bestSalerProducts as $product)
                {{-- {{ dd($product) }} --}}
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic">
                            <a href="{{ route('customer.productDetail',$product->id) }}">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            </a>
                            <ul class="featured__item__pic__hover">
                            <livewire:customer.feature.add-to-cart :product="$product" :key="time().$product->id">
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
    <!-- best saler Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('client') }}/img/banner/laptop.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('client') }}/img/banner/phone.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- latest Product Section Begin -->
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
                            <livewire:customer.feature.add-to-cart :product="$product" :key="time().$product->id">
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
    <!-- latest Product Section End -->
</div>
