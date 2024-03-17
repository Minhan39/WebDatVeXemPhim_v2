<!--== Start Header Area ==-->
<header class="header-area">
    <div class="container container-wide">
    <div class="row align-items-center">
        <div class="col-sm-4 col-lg-2">
        <div class="site-logo text-center text-sm-left">
            <a href="index.html"
            ><img src="{{asset('img/logo.png')}}" alt="Logo"
            /></a>
        </div>
        </div>

        <div class="col-lg-7 d-none d-lg-block">
        <div class="site-navigation">
            <ul class="main-menu nav">
            <li>
                <a href="{{route('home')}}">Home</a>
            </li>
            <li><a href="{{route('about')}}">About</a></li>
            <li class="has-submenu">
                <a href="#">Shop</a>
                <ul class="sub-menu">
                <li>
                    <a href="{{route('movie-list')}}">Shop Left Sidebar</a>
                </li>
                <li><a href="{{route('movie')}}">Single Product</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#">Pages</a>
                <ul class="sub-menu">
                <li><a href="{{route('cart')}}">Cart</a></li>
                <li><a href="{{route('checkout')}}">Checkout</a></li>
                </ul>
            </li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        </div>

        <div class="col-sm-8 col-lg-3">
        <div
            class="site-action d-flex justify-content-center justify-content-sm-end align-items-center"
        >
            <ul class="login-reg-nav nav">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
            </ul>

            <div class="mini-cart-wrap">
            <a href="cart.html" class="btn-mini-cart">
                <i class="ion-bag"></i>
                <span class="cart-total">3</span>
            </a>

            <div class="mini-cart-content">
                <div class="mini-cart-product">
                <div class="mini-product">
                    <div class="mini-product__thumb">
                    <a href="single-product.html"
                        ><img
                        src="{{asset('img/product/product-1.png')}}"
                        alt="product"
                    /></a>
                    </div>
                    <div class="mini-product__info">
                    <h2 class="title">
                        <a href="single-product.html">Auto Clutch & Brake</a>
                    </h2>

                    <div class="mini-calculation">
                        <p class="price">5 x <span>$20.33</span></p>
                        <button class="remove-pro">
                        <i class="ion-trash-b"></i>
                        </button>
                    </div>
                    </div>
                </div>

                <div class="mini-product">
                    <div class="mini-product__thumb">
                    <a href="single-product.html"
                        ><img
                        src="{{asset('img/product/product-2.png')}}"
                        alt="product"
                    /></a>
                    </div>
                    <div class="mini-product__info">
                    <h2 class="title">
                        <a href="single-product.html"
                        >Leather Steering Wheel</a
                        >
                    </h2>

                    <div class="mini-calculation">
                        <p class="price">5 x <span>$20.33</span></p>
                        <button class="remove-pro">
                        <i class="ion-trash-b"></i>
                        </button>
                    </div>
                    </div>
                </div>

                <div class="mini-product">
                    <div class="mini-product__thumb">
                    <a href="single-product.html"
                        ><img
                        src="{{asset('img/product/product-3.png')}}"
                        alt="product"
                    /></a>
                    </div>
                    <div class="mini-product__info">
                    <h2 class="title">
                        <a href="single-product.html"
                        >Leather Steering Wheel</a
                        >
                    </h2>

                    <div class="mini-calculation">
                        <p class="price">5 x <span>$20.33</span></p>
                        <button class="remove-pro">
                        <i class="ion-trash-b"></i>
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="responsive-menu d-lg-none">
            <button class="btn-menu">
                <i class="fa fa-bars"></i>
            </button>
            </div>
        </div>
        </div>
    </div>
    </div>
</header>
<!--== End Header Area ==-->