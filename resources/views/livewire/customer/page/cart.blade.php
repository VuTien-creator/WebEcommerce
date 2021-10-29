<div>
    <!-- Shoping Cart Section Begin -->
    @if ($cart->count() == 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-12 float-center">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('customer.shop') }}" class="primary-btn ">CONTINUE SHOPPING</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $product)
                                        <tr>

                                            <td class="shoping__cart__item">
                                                <img src="img/cart/cart-1.jpg" alt="">
                                                <h5>{{ $product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ number_format($product->price) }} VND
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $product->qty }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ number_format($product->price * $product->qty) }} VND
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"></span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ route('customer.shop') }}" class="primary-btn ">CONTINUE SHOPPING</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- discount code --}}
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                {{-- {{ dd($cartSubTotal) }} --}}
                                <li>Subtotal <span>{{ number_format($cartSubTotal) }} VND</span></li>
                                <li>Total <span>{{ number_format($cartSubTotal) }} VND</span></li>
                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Shoping Cart Section End -->
</div>
