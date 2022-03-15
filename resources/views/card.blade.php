@extends('base')

@section('main')
    <nav class="navigation">
        <div class="wrap navigation-wrap">
            <p class="navigation-arrivals">NEW ARRIVALS</p>
            <div class="navigation-items">
                <a href="{{ route('shop::home') }}">
                    <p class="nav-text">HOME</p>
                </a>
                @if(isset($gender))
                    <span>/</span>
                    <a href="{{ route('shop::catalog::index', ['gender' => $gender]) }}">
                        <p class="nav-text" id="nav-gender">{{ strtoupper($gender) }}</p>
                    </a>
                @endif
                <span>/</span>
                <a href="#">
                    <p class="nav-text">NEW ARRIVALS</p>
                </a>
            </div>
    </nav>
    <main>
        <article class="slider">
            <section class="slider-image">
                @if($item['id'] > 1)
                    <a href="{{ route('shop::card', ['id' => $item['id']-1]) }}" class="slider-arrow left-arrow">
                        <svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.99512 2L3.99512 7L8.99512 12L7.99512 14L0.995117 7L7.99512 0L8.99512 2Z"/>
                        </svg>
                    </a>
                @endif
                <img src="{{ asset($item['image']) }}" alt="slider" class="slider-image-img">
                @if(\App\Models\Items::find($item['id']+1))
                    <a href="{{ route('shop::card', ['id' => $item['id']+1]) }}" class="slider-arrow right-arrow">
                        <svg width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z"/>
                        </svg>
                    </a>
                @endif
            </section>
            <section class="wrap slider-infocard">
                <h2 class="name-collection">{{ strtoupper($item['gender']) }} COLLECTION</h2>
                <img src="{{ asset('image/sline.svg') }}" alt="#" class="sline">
                <h3 class="name-product">{{ $item['title'] }}</h3>
                <p class="desc-product">{{ $item['content'] }}</p>
                <p class="price-product">{{ $subOptions['price'] * $subOptions['quantity'] }} $</p>
                <img src="{{ asset('image/line.svg') }}" alt="" class="line">
                <div class="choose-spec">
                    <input type="hidden" id="itemId" value="{{ $item['id'] }}">
                    <details class="choose-spec-details  color-select">
                        <summary class="choose-spec-details-summary">CHOOSE COLOR</summary>
                        <ul>
                            @foreach($colors as $key => $color)
                                @if($key + 1 == $subOptions['color'])
                                    <li>
                                        <input type="radio" checked id="color_{{ $key + 1}}"
                                               name="color" class="choose-spec-input choose-spec-input-color" value="{{ $color }}">
                                        <label
                                            for="color_{{ $key + 1 }}">{{ \App\Models\Color::find($color)->name }}</label>
                                    </li>
                                @else
                                    <li>
                                        <input type="radio" id="color_{{ $key + 1 }}"
                                               name="color" class="choose-spec-input choose-spec-input-color" value="{{ $color }}">
                                        <label
                                            for="color_{{ $key + 1 }}">{{ \App\Models\Color::find($color)->name }}</label>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </details>
                    <details class="choose-spec-details size-select">
                        <summary class="choose-spec-details-summary">CHOOSE SIZE</summary>
                        <ul>
                            @foreach($sizes as $key => $size)
                                @if($key + 1 == $subOptions['size'])
                                    <li>
                                        <input type="radio" checked id="size_{{ $key + 1 }}"
                                               class="choose-spec-input" name="size"
                                               value="{{ $size }}">
                                        <label
                                            for="size_{{ $key + 1 }}">{{ \App\Models\Size::find($size)->name }}</label>
                                    </li>
                                @else
                                    <li>
                                        <input type="radio" id="size_{{ $key + 1 }}"
                                               class="choose-spec-input" name="size"
                                               value="{{ $size }}">
                                        <label
                                            for="size_{{ $key + 1 }}">{{ \App\Models\Size::find($size)->name }}</label>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </details>
                    <details class="choose-spec-details quantity-select">
                        <summary class="choose-spec-details-summary">QUANTITY</summary>
                        <ul>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i == $subOptions['quantity'])
                                    <li>
                                        <input type="radio" checked name="quantity" class="choose-spec-input"
                                               id="quantity_{{$i}}"
                                               value="{{$i}}">
                                        <label for="quantity_{{$i}}">{{$i}}</label>
                                    </li>
                                @else
                                    <li>
                                        <input type="radio" name="quantity" value="{{$i}}" class="choose-spec-input" id="quantity_{{$i}}">
                                        <label for="quantity_{{$i}}">{{$i}}</label>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </details>
                </div>
                </form>
                <footer class="slider-footer">
                    <a href=" {{route('shop::cart::add', ['options' => $subOptions['id'], 'quantity' => $subOptions['quantity']])}} "
                       class="#">
                        <div class="slider-footer-button">
                            <svg width="33" height="29" viewBox="0 0 33 29" class="slider-cart-logo" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M27.199 29C26.5512 28.9738 25.9396 28.6948 25.4952 28.2227C25.0509 27.7506 24.8094 27.1232 24.8225 26.475C24.8356 25.8269 25.1023 25.2097 25.5653 24.7559C26.0283 24.3022 26.6508 24.048 27.2991 24.048C27.9474 24.048 28.5697 24.3022 29.0327 24.7559C29.4957 25.2097 29.7624 25.8269 29.7755 26.475C29.7886 27.1232 29.5471 27.7506 29.1028 28.2227C28.6585 28.6948 28.0468 28.9738 27.399 29H27.199ZM7.75098 26.32C7.75098 25.79 7.90815 25.2718 8.20264 24.8311C8.49712 24.3904 8.91569 24.0469 9.4054 23.844C9.8951 23.6412 10.434 23.5881 10.9539 23.6915C11.4737 23.7949 11.9512 24.0502 12.326 24.425C12.7009 24.7998 12.9562 25.2773 13.0596 25.7972C13.163 26.317 13.1098 26.8559 12.907 27.3456C12.7041 27.8353 12.3606 28.2539 11.9199 28.5483C11.4792 28.8428 10.9611 29 10.431 29C10.0789 29.0003 9.73017 28.9311 9.40479 28.7966C9.0794 28.662 8.78374 28.4646 8.53467 28.2158C8.28559 27.9669 8.08805 27.6713 7.95325 27.3461C7.81844 27.0208 7.74902 26.6721 7.74902 26.32H7.75098ZM11.551 20.686C11.2916 20.6868 11.039 20.6024 10.8322 20.4457C10.6253 20.2891 10.4756 20.0689 10.406 19.819L5.573 2.36401H2.18005C1.86657 2.36401 1.56591 2.23947 1.34424 2.01781C1.12257 1.79614 0.998047 1.49549 0.998047 1.18201C0.998047 0.868519 1.12257 0.567873 1.34424 0.346205C1.56591 0.124537 1.86657 5.81268e-06 2.18005 5.81268e-06H6.46106C6.72055 -0.00080736 6.97309 0.0837201 7.17981 0.240568C7.38653 0.397416 7.53589 0.617884 7.60498 0.868006L12.438 18.323H25.616L29.999 8.27501H15.399C15.2409 8.27961 15.0834 8.25242 14.9359 8.19507C14.7884 8.13771 14.6539 8.05134 14.5404 7.94108C14.4269 7.83082 14.3366 7.69891 14.275 7.55315C14.2134 7.40739 14.1816 7.25075 14.1816 7.0925C14.1816 6.93426 14.2134 6.77762 14.275 6.63186C14.3366 6.4861 14.4269 6.35419 14.5404 6.24393C14.6539 6.13367 14.7884 6.0473 14.9359 5.98994C15.0834 5.93259 15.2409 5.90541 15.399 5.91001H31.812C32.0077 5.90996 32.2003 5.95866 32.3724 6.05172C32.5446 6.14478 32.6908 6.27926 32.798 6.44301C32.9058 6.60729 32.9714 6.79569 32.9889 6.99145C33.0063 7.18721 32.9752 7.38424 32.8981 7.565L27.493 19.977C27.4007 20.1876 27.249 20.3668 27.0565 20.4927C26.864 20.6186 26.6391 20.6858 26.4091 20.686H11.551Z"/>
                            </svg>
                            <p>Add to Cart</p>
                        </div>
                    </a>
                </footer>
            </section>
        </article>
        <article class="products wrap products-product-margin">
            <div class="products-items ">
                @foreach($offer as $item)
                    <section class="products-items-item">
                        <div class="add-to-cart">
                            <a href="{{ route('shop::card', ['id' => $item['id']]) }}" class="#">
                                <div class="add-to-cart-button">
                                    <svg width="33" height="29" viewBox="0 0 33 29" class="add-to-cart-logo" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27.199 29C26.5512 28.9738 25.9396 28.6948 25.4952 28.2227C25.0509 27.7506 24.8094 27.1232 24.8225 26.475C24.8356 25.8269 25.1023 25.2097 25.5653 24.7559C26.0283 24.3022 26.6508 24.048 27.2991 24.048C27.9474 24.048 28.5697 24.3022 29.0327 24.7559C29.4957 25.2097 29.7624 25.8269 29.7755 26.475C29.7886 27.1232 29.5471 27.7506 29.1028 28.2227C28.6585 28.6948 28.0468 28.9738 27.399 29H27.199ZM7.75098 26.32C7.75098 25.79 7.90815 25.2718 8.20264 24.8311C8.49712 24.3904 8.91569 24.0469 9.4054 23.844C9.8951 23.6412 10.434 23.5881 10.9539 23.6915C11.4737 23.7949 11.9512 24.0502 12.326 24.425C12.7009 24.7998 12.9562 25.2773 13.0596 25.7972C13.163 26.317 13.1098 26.8559 12.907 27.3456C12.7041 27.8353 12.3606 28.2539 11.9199 28.5483C11.4792 28.8428 10.9611 29 10.431 29C10.0789 29.0003 9.73017 28.9311 9.40479 28.7966C9.0794 28.662 8.78374 28.4646 8.53467 28.2158C8.28559 27.9669 8.08805 27.6713 7.95325 27.3461C7.81844 27.0208 7.74902 26.6721 7.74902 26.32H7.75098ZM11.551 20.686C11.2916 20.6868 11.039 20.6024 10.8322 20.4457C10.6253 20.2891 10.4756 20.0689 10.406 19.819L5.573 2.36401H2.18005C1.86657 2.36401 1.56591 2.23947 1.34424 2.01781C1.12257 1.79614 0.998047 1.49549 0.998047 1.18201C0.998047 0.868519 1.12257 0.567873 1.34424 0.346205C1.56591 0.124537 1.86657 5.81268e-06 2.18005 5.81268e-06H6.46106C6.72055 -0.00080736 6.97309 0.0837201 7.17981 0.240568C7.38653 0.397416 7.53589 0.617884 7.60498 0.868006L12.438 18.323H25.616L29.999 8.27501H15.399C15.2409 8.27961 15.0834 8.25242 14.9359 8.19507C14.7884 8.13771 14.6539 8.05134 14.5404 7.94108C14.4269 7.83082 14.3366 7.69891 14.275 7.55315C14.2134 7.40739 14.1816 7.25075 14.1816 7.0925C14.1816 6.93426 14.2134 6.77762 14.275 6.63186C14.3366 6.4861 14.4269 6.35419 14.5404 6.24393C14.6539 6.13367 14.7884 6.0473 14.9359 5.98994C15.0834 5.93259 15.2409 5.90541 15.399 5.91001H31.812C32.0077 5.90996 32.2003 5.95866 32.3724 6.05172C32.5446 6.14478 32.6908 6.27926 32.798 6.44301C32.9058 6.60729 32.9714 6.79569 32.9889 6.99145C33.0063 7.18721 32.9752 7.38424 32.8981 7.565L27.493 19.977C27.4007 20.1876 27.249 20.3668 27.0565 20.4927C26.864 20.6186 26.6391 20.6858 26.4091 20.686H11.551Z"/>
                                    </svg>
                                    <p>Add to Cart</p>
                                </div>
                            </a>
                        </div>
                        <img src={{ asset($item['image']) }} alt="item_id{{ $item['id'] }}">
                        <a href="{{ route('shop::card', ['id' => $item['id']]) }}">
                            <h3 class="products-items-item-name">{{ $item['title'] }}</h3></a>
                        <p class="products-items-item-text"> {{ $item['content'] }}</p>
                        <p class="products-items-item-price">{{ $item['price'] }}</p>
                    </section>
                @endforeach
            </div>
        </article>
    </main>
@endsection
