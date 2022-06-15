@extends('base')

@section('main')
    <nav class="navigation">
        <div class="wrap navigation-wrap navigation-mobile">
            <p class="navigation-arrivals">SHOPING CART</p>
        </div>
    </nav>
    <main class="cart wrap">
        <article class="cart-products">
            @forelse($orders as $order)
                <article class="cart-product"><img src="{{ $order['item']->image }}"
                                                   class="cart-product-image" alt="arr3"
                                                   width="262" height="306">
                    <a href=" {{ route('shop::cart::delete', ['id' => $order['optionId']]) }}"><i
                            class="fas fa-times cross-cart"></i></a>
                    <div class="info-cart">
                        <p class="name-item">{{ $order['item']->title }}
                            <br> T-SHIRT</p>
                        <div class="spec-item">
                            <p class="price-item">Price: <span id="price_{{ $order['price'] }}"
                                                               class="price-item-value">{{ $order['price'] * $order['quantity'] }}</span>$
                            </p>
                            <p class="color-item">Color: <span
                                    id="color"> {{ $order['color']->name }}</span></p>
                            <p class="size-item">Size: {{ $order['size']->name }}</p>
                            <p class="size-quantity">Quantity:
                                <input type="number" min="1" max="50" class="input-size-quantity"
                                       id="count_{{ $order['price'] }}"
                                       value="{{ $order['quantity'] }}"></p>
                        </div>
                    </div>
                </article>
            @empty
                <p class="navigation-arrivals">Корзина пуста</p>
            @endforelse
            <footer class="button-cart">
                <a href=" {{ route('shop::cart::clear') }}" style="text-decoration: none"><input type="reset"
                                                                                                 class="btn-cart"
                                                                                                 value="CLEAR SHOPPING"></a>
                <a href=" {{ route('shop::catalog::index', ['page' => 1]) }}" style="text-decoration: none"><input type="button"
                                                                                             class="btn-cart"
                                                                                             value="CONTINUE SHOPPING"></a>
            </footer>
        </article>
        <form action="#" class="checkout">
            <fieldset>
                <legend>SHIPPIN ADRESS</legend>
                <input type="text" placeholder="Bangladesh" class="input-adress">
                <br>
                <input type="text" placeholder="State" class="input-adress">
                <br>
                <input type="text" placeholder="Postcode / Zip" class="input-adress">
                <br>
                <input type="submit" value="GET A QUOTE" class="btn-cart">
                <br></fieldset>
            <fieldset>
                <div class="total-checkout">
                    <p class="sub-total">SUB TOTAL<span id="sub-total">$0</span></p>
                    <p class="grand-total">GRAND TOTAL<span id="total">$0</span></p>
                    <input type="submit" class="btn-checkout" id="checkout_btn" value="PROCEED TO CHECKOUT"></div>
            </fieldset>
        </form>
    </main>
@endsection
