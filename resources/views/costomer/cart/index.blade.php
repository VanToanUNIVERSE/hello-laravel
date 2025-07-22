@extends('layouts.home')
@section('title', 'Giỏ hàng')
@section('content')
@php
    $total = 0;
@endphp
<head>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

    @include('partials.flash')
    <div class="container mt-5">
    <div class="row">
        <!-- Shopping Cart Items -->
        <div class="col-lg-8">
            <h3>Your Shopping Cart</h3>

            @if(empty($cart))
                <h1>Không có sản phẩm nào trong giỏ</h1>
            @endif
            @foreach ($cart as $cartItem)
                @php
                    $subtotal = $cartItem['quantity'] * $cartItem['price'];
                    $total += $subtotal;
                @endphp
                 <div class="cart-item d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="{{ asset('uploads/'.$cartItem['image']) }}" alt="Product" class="product-img me-3">
                        <div>
                            <h5>{{ $cartItem['name'] }} </h5>
                            <p class="text-muted">Description of the product.</p>
                            <input type="number" class="form-control w-50" value="{{ $cartItem['quantity'] }}" min="1" onchange="changeQuantity(event, {{ $cartItem['id'] }})">
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between">
                        <span data-productPrice="{{ $cartItem['price'] }}">{{ number_format($cartItem['price'], 0, ',', '.') }} đ</span>
                        <form method="get" action="{{ route('costomer.cart.remove', $cartItem['id']) }}">
                            <button class="btn btn-sm btn-danger" onclick="">Remove</button>
                        </form>
                        
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="col-lg-4">
            <div class="cart-summary">
                <form action="{{ route('costomer.cart.checkout') }}" method="post">
                    @csrf
                    <h4>Hoàn tất đặt hàng</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between mt-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="cod" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios2" value="bank_transfer">
                                <label class="form-check-label" for="exampleRadios2">
                                    Tiền trong ví
                                </label>
                            </div>
                        </li>
                        <li class="">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                                <textarea class="form-control w-100" name="address"  id="exampleFormControlTextarea1" rows="3">{{ Auth::user()->address ?? "" }}</textarea>
                            </div>
                        </li>
                        <li class="">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Số điện thoại</label>
                                <input class="form-control w-100" name="phone" placeholder="Nhập số điện thoại" value="{{ Auth::user()->phone ?? "" }}"></input>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="total-price">Total:</span>
                            <span class="total-price" id="total-price">{{ number_format($total, 0, ',', '.') }} đ</span>
                            <input name="totalPrice" type="hidden" value="{{ $total }}"></input>
                        </li>
                    </ul>
                    <button class="btn btn-checkout w-100" type="submit">Đặt hàng</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection