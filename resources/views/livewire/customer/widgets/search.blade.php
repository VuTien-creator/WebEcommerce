<div>
    <!-- Hero Section Begin -->
    <section class="hero {{ Request::path() == '/' ? '' : 'hero-normal' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ($categories as $item)
                            <li><a href="#">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>113</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    @if (Request::path() == '/')
                        <div class="hero__item set-bg" data-setbg="{{ asset('client') }}/img/banner/banner.png">
                            <div class="hero__text">
                                <span>Good Choice</span>
                                <h2>New Product <br /></h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="{{ route('customer.shop') }}" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>
