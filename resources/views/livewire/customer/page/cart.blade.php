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
                                    @foreach ($cart as $id => $product)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                                                <a href="{{ route('customer.productDetail', $id) }}">
                                                    <h5>{{ $product['name'] }}</h5>
                                                </a>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ number_format($product['price']) }} VND
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                {{-- <livewire:customer.feature.update-cart :product='$product'> --}}
                                                <button
                                                    class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                                    wire:click="updateCartItem({{ $id }}, 'minus')"> -
                                                </button>
                                                {{ $product['quantity'] }}
                                                <button
                                                    class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                                    wire:click="updateCartItem({{ $id }}, 'plus')"> +
                                                </button>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ number_format($product['price'] * $product['quantity']) }} VND
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"
                                                    wire:click='removeFromCart({{ $id }})'></span>
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
                                <li>Subtotal <span>{{ $cartSubTotal }} VND</span></li>
                                <li>Total <span>{{ $cartSubTotal }} VND</span></li>
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
