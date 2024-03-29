@extends('layouts.master')

@section('content')
<!--== Start Page Header Area ==-->
<div
    class="page-header-wrap bg-img"
    data-bg="{{asset('img/bg/page-header-bg.jpg')}}"
>
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <div class="page-header-content">
            <div class="page-header-content-inner">
            <h1>Shopping Cart</h1>

            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li class="current"><a href="#">Cart</a></li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!--== End Page Header Area ==-->

<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="cart-page-content-wrap">
    <div class="container container-wide">
        <div class="row">
        <div class="col-lg-8">
            <div class="shopping-cart-list-area">
            <div class="shopping-cart-table table-responsive">
                <table class="table table-bordered text-center mb-0">
                <thead>
                    <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-1.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Metallic cotton dress</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="1"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-2.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Open-knit sweater</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="3"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-3.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Metallic cotton dress</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="2"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-4.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Open-knit sweater</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="5"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-5.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Metallic cotton dress</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="3"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$29.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-6.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Open-knit sweater</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="1"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    </tr>

                    <tr>
                    <td class="product-list">
                        <div
                        class="cart-product-item d-flex align-items-center"
                        >
                        <div class="remove-icon">
                            <button><i class="fa fa-trash-o"></i></button>
                        </div>
                        <a href="single-product.html" class="product-thumb">
                            <img
                            src="{{asset('img/product/product-7.png')}}"
                            alt="Product"
                            />
                        </a>
                        <a href="single-product.html" class="product-name"
                            >Open-knit sweater</a
                        >
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    <td>
                        <div class="pro-qty">
                        <input
                            type="text"
                            class="quantity"
                            title="Quantity"
                            value="1"
                        />
                        </div>
                    </td>
                    <td>
                        <span class="price">$39.99</span>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div
                class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center"
            >
                <div class="coupon-form-wrap">
                <form action="#" method="post">
                    <label for="coupon" class="sr-only">Coupon Code</label>
                    <input
                    type="text"
                    id="coupon"
                    placeholder="Coupon Code"
                    />
                    <button class="btn-apply">Apply Button</button>
                </form>
                </div>

                <div class="cart-update-buttons mt-15 mt-sm-0">
                <button class="btn-clear-cart">Clear Cart</button>
                <button class="btn-update-cart">Update Cart</button>
                </div>
            </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Cart Calculate Area -->
            <div class="cart-calculate-area mt-sm-40 mt-md-60">
            <h5 class="cal-title">Cart Totals</h5>

            <div class="cart-cal-table table-responsive">
                <table class="table table-borderless">
                <tr class="cart-sub-total">
                    <th>Subtotal</th>
                    <td>$289.89</td>
                </tr>
                <tr class="shipping">
                    <th>Shipping</th>
                    <td>
                    <ul class="shipping-method">
                        <li>
                        <div class="form-check">
                            <input
                            type="radio"
                            id="flat_shipping"
                            name="shipping_method"
                            class="form-check-input"
                            checked
                            />
                            <label
                            class="form-check-label"
                            for="flat_shipping"
                            >Flat Rate : $10</label
                            >
                        </div>
                        </li>
                        <li>
                        <div class="form-check">
                            <input
                            type="radio"
                            id="free_shipping"
                            name="shipping_method"
                            class="form-check-input"
                            />
                            <label
                            class="form-check-label"
                            for="free_shipping"
                            >Free Shipping</label
                            >
                        </div>
                        </li>
                        <li>
                        <div class="form-check">
                            <input
                            type="radio"
                            id="cod_shipping"
                            name="shipping_method"
                            class="form-check-input"
                            />
                            <label class="form-check-label" for="cod_shipping"
                            >Cash on Delivery</label
                            >
                        </div>
                        </li>
                    </ul>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>Total</th>
                    <td><b>$299.93</b></td>
                </tr>
                </table>
            </div>

            <div class="proceed-checkout-btn">
                <a href="checkout.html" class="btn btn-brand d-block"
                >Proceed to Checkout</a
                >
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<!-- Scroll Top Button -->
<button class="btn-scroll-top"><i class="ion-chevron-up"></i></button>

<!--== Start Responsive Menu Wrapper ==-->
<aside class="off-canvas-wrapper off-canvas-menu">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner">
    <!-- Start Off Canvas Content -->
    <div class="off-canvas-content">
        <div class="off-canvas-header">
        <div class="logo">
            <a href="index.html"
            ><img src="{{asset('img/logo.png')}}" alt="Logo"
            /></a>
        </div>
        <div class="close-btn">
            <button class="btn-close">
            <i class="ion-android-close"></i>
            </button>
        </div>
        </div>

        <!-- Content Auto Generate Form Main Menu Here -->
        <div class="res-mobile-menu mobile-menu"></div>
    </div>
    </div>
</aside>
<!--== End Responsive Menu Wrapper ==-->
@stop