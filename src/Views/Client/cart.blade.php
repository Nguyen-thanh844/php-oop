@extends('layouts.master')
@section('title')
Cart
@endsection
@section('content')

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/client/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url() }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table ">
                        <thead>
                            <tr>
                                <th class=" shoping__product">Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                            @php
                            $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                            @endphp
                            @foreach ($cart as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ asset($item['img_thumbnail']) }}" width="100px" alt="">
                                    <h5>{{ $item['name'] }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ $item['price']  }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity w-[140px] h-[40px] bg-slate-200">

                                        @php
                                        $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                        @endphp
                                        <a class="" href="{{ $url }}">-</a>

                                        {{ $item['quantity'] }}

                                        @php
                                        $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                        @endphp
                                        <a class="" href="{{ $url }}">+</a>

                                    </div>
                                </td>

                                <td class="shoping__cart__total">
                                    {{ $item['quantity'] * $item['price'] }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    @php
                                    $url = url('cart/remove') . '?productID=' . $item['id'];

                                    if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                    $url .= '&cartID=' . $_SESSION['cart_id'];
                                    }
                                    @endphp
                                    <a onclick="return confirm('Có chắn không?')" href="{{ $url }}">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 mb-2 mt-2">
                <form action="{{ url('order/checkout') }}" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="{{ $_SESSION['user']['name'] ?? null }}" placeholder="Enter name" name="user_name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $_SESSION['user']['email'] ?? null }}" placeholder="Enter email" name="user_email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone" value="{{ $_SESSION['user']['phone'] ?? null }}" placeholder="Enter phone" name="user_phone">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" value="{{ $_SESSION['user']['address'] ?? null }}" placeholder="Enter address" name="user_address">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->


@endsection