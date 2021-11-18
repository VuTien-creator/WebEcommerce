<div>
    {{-- <div> --}}
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
                    <li><a href="{{ route('customer.cart') }}"><i class="fa fa-shopping-cart"></i> <span>{{ $countItem }}</span></a></li>
                </ul>
                <div class="header__cart__price">item: <span>{{ number_format($cartSubTotal) }} VND</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__language">
                    <img src="{{ asset('client') }}/img/language.png" alt="">
                    <div>English</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">VietNamese</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{ asset('client') }}/#"><i class="fa fa-user"></i> Login</a>
                </div>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a
                            href="{{ route('customer.index') }}">Home</a></li>
                    <li class="{{ Request::path() == 'shop' ? 'active' : '' }}"><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li class="{{ Request::path() == 'cart' ? 'active' : '' }}"><a href="{{ route('customer.cart') }}">Cart</a></li>
                    @auth
                        <li class="{{ Request::path() == 'checkout' ? 'active' : '' }}"><a href="{{ route('customer.checkout') }}">Checkout</a></li>
                    @endauth
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
            </div>
        </div>
        <!-- Humberger End -->

        <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__right">

                                <div class="header__top__right__language">
                                    <img src="{{ asset('client') }}/img/language.png" alt="">
                                    <div>English</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{ asset('client') }}/#">Spanis</a></li>
                                        <li><a href="{{ asset('client') }}/#">English</a></li>
                                    </ul>
                                </div>
                                @guest
                                <div class="header__top__right__social">
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                </div>
                                <div class="header__top__right__social">
                                    <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                                </div>
                                @endguest

                                @auth
                                <div class="header__top__right__social">
                                    <a href="#"><i class="fa fa-user"></i> Profile</a>
                                </div>
                                <div class="header__top__right__auth">
                                    {{-- <a href=""><i class="fa fa-user"></i> Logout</a> --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit(); " role="button">
                                                <i class="fas fa-sign-out-alt"></i>

                                                {{ __('Log Out') }}
                                            </a>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="{{ asset('client') }}/./index.html"><img
                                    src="{{ asset('client') }}/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a
                                        href="{{ route('customer.index') }}">Home</a></li>
                                <li class="{{ Request::path() == 'shop' ? 'active' : '' }}"><a href="{{ route('customer.shop') }}">Shop</a></li>
                                <li class="{{ Request::path() == 'cart' ? 'active' : '' }}"><a href="{{ route('customer.cart') }}">Cart</a></li>
                                @auth
                                    <li class="{{ Request::path() == 'checkout' ? 'active' : '' }}"><a
                                            href="{{ route('customer.checkout') }}">Checkout</a>
                                    </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <livewire:customer.feature.cart-counter >
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>

        {{-- <livewire:customer.widgets.search>
        <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section ">
        <img src="{{ asset('client') }}/img/breadcrumb.jpg" alt="">
    </section>
    <!-- Breadcrumb Section End --> --}}
    {{-- </div> --}}
</div>
