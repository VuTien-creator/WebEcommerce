<div>
    <div class="header__cart">
        <ul>
            <li><a href="{{ route('customer.cart') }}"><i class="fa fa-shopping-cart"></i>
                    <span>{{ $countItem }}</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>{{ number_format($cartSubTotal) }} VND</span></div>
    </div>
</div>
