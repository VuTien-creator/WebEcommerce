<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section ">
        <img src="{{ asset('client') }}/img/breadcrumb.jpg" alt="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @for ($i = 0; $i <= 3; $i++)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg"
                                                        alt="{{ $latestProducts[$i]->name }}">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latestProducts[$i]->name }}</h6>
                                                    <span>{{ number_format($latestProducts[$i]->price) }} VND</span>
                                                </div>
                                            </a>
                                        @endfor
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @for ($i = 4; $i <= 7; $i++)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset('client') }}/img/latest-product/lp-1.jpg"
                                                        alt="{{ $latestProducts[$i]->name }}">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $latestProducts[$i]->name }}</h6>
                                                    <span>{{ number_format($latestProducts[$i]->price) }} VND</span>
                                                </div>
                                            </a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                                {{-- <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    {{-- <div class="product__item__pic set-bg"
                                        data-setbg="{{ $product->image }}"> --}}
                                    <div class="product__item__pic">
                                        <img src="{{ $product->image }}" alt="{{ $product->image }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->name }}</a></h6>
                                        <h5>{{ number_format($product->price) }} VND</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{-- {{ dd($products) }} --}}
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
