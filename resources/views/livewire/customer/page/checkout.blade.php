<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                {{-- <form action="#"> --}}
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Your Name<span></span></p>
                                    <input type="text" value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Your Email<span></span></p>
                                    <input type="text" value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="checkout__input col-lg-6">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            @if ($cart->count() <= 0)
                                <div class="text-center">
                                    <div class="checkout__order__total">{{ $message }}</div>
                                </div>
                            @else
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ($cart as $product)
                                        {{-- {{ dd($product) }} --}}
                                        <li>{{ $product['name'] }}
                                            <span>{{ number_format($product['price'] * $product['quantity']) }}
                                                VND</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>{{ $subTotal }} VND</span>
                                </div>
                                <div class="checkout__order__total">Total <span>{{ $subTotal }} VND</span></div>
                                <button type="submit" wire:click.prevent='checkout' class="site-btn">PLACE
                                    ORDER</button>

                                
                            @endif
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
