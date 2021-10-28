<div>
    <div>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Humberger Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="{{ asset('client') }}/#"><img src="{{ asset('client') }}/img/logo.png" alt=""></a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li><a href="{{ asset('client') }}/#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                    <li><a href="{{ asset('client') }}/#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                </ul>
                <div class="header__cart__price">item: <span>$150.00</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__language">
                    <img src="{{ asset('client') }}/img/language.png" alt="">
                    <div>English</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="{{ asset('client') }}/#">Spanis</a></li>
                        <li><a href="{{ asset('client') }}/#">English</a></li>
                    </ul>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{ asset('client') }}/#"><i class="fa fa-user"></i> Login</a>
                </div>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li class="active"><a href="{{ asset('client') }}/./index.html">Home</a></li>
                    <li><a href="{{ asset('client') }}/./shop-grid.html">Shop</a></li>
                    <li><a href="{{ asset('client') }}/#">Pages</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="{{ asset('client') }}/./shop-details.html">Shop Details</a></li>
                            <li><a href="{{ asset('client') }}/./shoping-cart.html">Shoping Cart</a></li>
                            <li><a href="{{ asset('client') }}/./checkout.html">Check Out</a></li>
                            <li><a href="{{ asset('client') }}/./blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('client') }}/./blog.html">Blog</a></li>
                    <li><a href="{{ asset('client') }}/./contact.html">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
                <a href="{{ asset('client') }}/#"><i class="fa fa-facebook"></i></a>
                <a href="{{ asset('client') }}/#"><i class="fa fa-twitter"></i></a>
                <a href="{{ asset('client') }}/#"><i class="fa fa-linkedin"></i></a>
                <a href="{{ asset('client') }}/#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                    <li>Free Shipping for all Order of $99</li>
                </ul>
            </div>
        </div>
        <!-- Humberger End -->

        <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__left">
                                <ul>
                                    <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                    <li>Free Shipping for all Order of $99</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="{{ asset('client') }}/#"><i class="fa fa-facebook"></i></a>
                                    <a href="{{ asset('client') }}/#"><i class="fa fa-twitter"></i></a>
                                    <a href="{{ asset('client') }}/#"><i class="fa fa-linkedin"></i></a>
                                    <a href="{{ asset('client') }}/#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                <div class="header__top__right__language">
                                    <img src="{{ asset('client') }}/img/language.png" alt="">
                                    <div>English</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{ asset('client') }}/#">Spanis</a></li>
                                        <li><a href="{{ asset('client') }}/#">English</a></li>
                                    </ul>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ asset('client') }}/#"><i class="fa fa-user"></i> Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="{{ asset('client') }}/./index.html"><img src="{{ asset('client') }}/img/logo.png"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="{{ asset('client') }}/./index.html">Home</a></li>
                                <li><a href="{{ asset('client') }}/./shop-grid.html">Shop</a></li>
                                <li><a href="{{ asset('client') }}/#">Pages</a>
                                    <ul class="header__menu__dropdown">
                                        <li><a href="{{ asset('client') }}/./shop-details.html">Shop Details</a></li>
                                        <li><a href="{{ asset('client') }}/./shoping-cart.html">Shoping Cart</a></li>
                                        <li><a href="{{ asset('client') }}/./checkout.html">Check Out</a></li>
                                        <li><a href="{{ asset('client') }}/./blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ asset('client') }}/./blog.html">Blog</a></li>
                                <li><a href="{{ asset('client') }}/./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                            <ul>
                                <li><a href="{{ asset('client') }}/#"><i class="fa fa-heart"></i> <span>1</span></a>
                                </li>
                                <li><a href="{{ asset('client') }}/#"><i class="fa fa-shopping-bag"></i>
                                        <span>3</span></a></li>
                            </ul>
                            <div class="header__cart__price">item: <span>$150.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>

        <!-- Hero Section Begin -->
        <section class="hero {{ Request::path() =='/'? '':'hero-normal'}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All departments</span>
                            </div>
                            <ul>
                                <li><a href="{{ asset('client') }}/#">Fresh Meat</a></li>
                                <li><a href="{{ asset('client') }}/#">Vegetables</a></li>
                                <li><a href="{{ asset('client') }}/#">Fruit & Nut Gifts</a></li>
                                <li><a href="{{ asset('client') }}/#">Fresh Berries</a></li>
                                <li><a href="{{ asset('client') }}/#">Ocean Foods</a></li>
                                <li><a href="{{ asset('client') }}/#">Butter & Eggs</a></li>
                                <li><a href="{{ asset('client') }}/#">Fastfood</a></li>
                                <li><a href="{{ asset('client') }}/#">Fresh Onion</a></li>
                                <li><a href="{{ asset('client') }}/#">Papayaya & Crisps</a></li>
                                <li><a href="{{ asset('client') }}/#">Oatmeal</a></li>
                                <li><a href="{{ asset('client') }}/#">Fresh Bananas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                        @if (Request::path() == '/')
                        <div class="hero__item set-bg" data-setbg="{{ asset('client') }}/img/hero/banner.jpg">
                            <div class="hero__text">
                                <span>FRUIT FRESH</span>
                                <h2>Vegetable <br />100% Organic</h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="{{ asset('client') }}/#" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
    </div>

</div>
