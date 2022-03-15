@extends('base')

@section('main')
    <nav class="navigation">
        <div class="wrap navigation-wrap navigation-mobile">
            <p class="navigation-arrivals">SHOPING CART</p>
        </div>
    </nav>
    <main class="cart wrap">
        <article class="cart-products">
            @forelse($items as $key => $item)
                <article class="cart-product"><img src="{{ \App\Models\Items::find($item[0]['item_id'])->image }}"
                                                   class="cart-product-image" alt="arr3"
                                                   width="262" height="306">
                    <a href=" {{ route('shop::cart::delete', ['id' => $item[0]['option_id']]) }}"><i
                            class="fas fa-times cross-cart"></i></a>
                    <div class="info-cart">
                        <p class="name-item">{{ \App\Models\Items::find($item[0]['item_id'])->title }}
                            <br> T-SHIRT</p>
                        <div class="spec-item">
                            <p class="price-item">Price: <span id="price_{{ $item[0]['price'] }}"
                                                               class="price-item-value">{{ $item[0]['price'] }}</span>$
                            </p>
                            <p class="color-item">Color: <span
                                    id="color"> {{ \App\Models\Color::find($item[0]['color_id'])->name }}</span></p>
                            <p class="size-item">Size: {{ \App\Models\Size::find($item[0]['size_id'])->name }}</p>
                            <p class="size-quantity">Quantity:
                                <input type="number" min="1" max="50" class="input-size-quantity"
                                       id="count_{{ $item[0]['price'] }}"
                                       value="{{ $item[0]['quantity'] }}"></p>
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
    <script>
        $(document).ready(function () {
            calcTotal();
            $(".input-size-quantity").click(calcTotal);
            $(".cart-product").click(calcSubTotal);

            function calcSubTotal() {
                let price = $(this).find(".price-item-value").html();
                let count = $(this).find(".input-size-quantity").val();
                $("#sub-total").html(price * count);
            }

            function calcTotal() {
                let total = 0;
                $(".price-item-value").each(function () {
                    let price = Number($(this).html());
                    let count = Number($(`#count_${price}`).val());
                    total += price * count;
                });
                $("#total").html(total);
            }

            if ($(".cart-products p").html() == 'Корзина пуста'){
                $("#checkout_btn").attr('type', 'hidden');
            }
        });
    </script>
@endsection
