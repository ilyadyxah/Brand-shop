<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,900&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/34a765a801.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="header">
    <div class="wrap header-wrap">
        <div class="header-logo">
            <a href="{{ route('shop::home') }}"><img src={{asset('image/logo-main.png')}} class="logo-main"
                                                      alt="main-logo"></a>
            <a href="#"><img src={{asset('image/logo-search.svg')}} class="logo-search" alt="search-logo"></a>
        </div>
        <div class="header-account">
            <div class="logo-burger"><img src={{asset('image/logo-burger.svg')}} class="logo-burger-animation" alt="burger-logo"></div>
            <a href="{{ route('shop::registration') }}"><img src={{asset('image/logo-ident.svg')}} class="logo-ident" alt="ident-logo"></a>
            <a href="{{ route('shop::cart') }}"><img src={{asset('image/logo-shop.svg')}} class="logo-shop"
                                                     alt="shop-logo"></a>
            <p class="shop-number clearfix"> {{ session('orders') ? count(session('orders')) : 0 }}</p>
        </div>
    </div>
        <div class="menu">
            <h2 class="name-menu"><a href="{{ route('shop::catalog::index') }}">MENU</a></h2>
            <p class="cat-menu"><a href="{{ route('shop::catalog::index', ['gender' => 'man']) }}">MAN</a></p>
            <ul>
                @foreach($overlayCategories as $overlayCategory)
                    @if (strtoupper($overlayCategory->gender) == 'MAN' )
                        <li class="li-menu"><a
                                href="{{ route('shop::catalog::index', ['category' => $overlayCategory->id, 'gender' => $overlayCategory->gender]) }}">{{ $overlayCategory->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <p class="cat-menu"><a href="{{ route('shop::catalog::index', ['gender' => 'woman']) }}">WOMAN</a></p>
            <ul>
                @foreach($overlayCategories as $overlayCategory)
                    @if (strtoupper($overlayCategory->gender) == 'WOMAN' )
                        <li class="li-menu"><a
                                href="{{ route('shop::catalog::index', ['category' =>$overlayCategory->id, 'gender' => $overlayCategory->gender]) }}">{{ $overlayCategory->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <p class="cat-menu"><a href="{{ route('shop::catalog::index', ['gender' => 'kids']) }}">KIDS</a></p>
            <ul>
                @foreach($overlayCategories as $overlayCategory)
                    @if (strtoupper($overlayCategory->gender) == 'KIDS' )
                        <li class="li-menu"><a
                                href="{{ route('shop::catalog::index', ['category' =>$overlayCategory->id, 'gender' => $overlayCategory->gender]) }}">{{ $overlayCategory->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <button class="menu-close-btn">X</button>
        </div>
    <div class="overlay" id="overlay-modal"></div>
</header>
@yield('main')
@yield('advantages')
<aside class="feedback">
    <div class="wrap feedback-wrap">
        <section class="feedback-comment"><img src={{ asset('image/avatar.png') }} class="feedback-comment-avatar"
                                               alt="avatar">
            <h6 class="feedback-comment-text">“Vestibulum quis porttitor dui! Quisque viverra nunc mi, a pulvinar purus
                condimentum“</h6></section>
        <section class="feedback-subscribe">
            <h6 class="feedback-subscribe-title">SUBSCRIBE
                <br> <span class="feedback-subscribe-text">FOR OUR NEWLETTER &amp; PROMOTION</span></h6>
            <form class="feedback-subscribe-form" action="#" method="get">
                <input type="email" class="enter-email" placeholder="Enter Your Email">
                <input type="button" class="btn-subscribe" value="Subscribe"></form>
        </section>
    </div>
</aside>
<footer class="footer">
    <div class="wrap footer-wrap">
        <p class="footer-text">© 2021 Brand All Rights Reserved.</p>
        <div class="footer-social"><a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i
                    class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-pinterest-p"></i></a> <a href="#"><i
                    class="fab fa-twitter"></i></a></div>
    </div>
</footer>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
{{--<script type="text/javascript" src="{!! asset('js/CatalogFilter.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/OptionSelect.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/OverlayMenu.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/AnimationButtons.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/save_scroll_coords.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/CalcTotalPrice.js') !!}"></script>--}}
</body>

</html>
