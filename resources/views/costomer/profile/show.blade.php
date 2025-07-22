@extends('layouts.home')
@section('title', 'Chi tiết đơn hàng '.$orderItems->first()->order_id)
@section('content')
    <section class="h-100 h-custom" style="background-color: #eee; ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;" position: relative>
                      <a href="{{ route('costomer.profile.index') }}" class="btn btn-close" style="position: absolute; top: 5%; right: 5%; z-index: 1"></a>
                <div class="card-body p-5">
                    <p class="lead fw-bold mb-5" style="color: #f37a27;">Chi tiết đơn</p>
                    <div class="row">
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Thời gian đặt</p>
                        <p>{{ $order->created_at }}</p>
                    </div>
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Mã đơn</p>
                        <p>{{ $order->id }}</p>
                    </div>
                    
                    </div>

                    <div class="row">
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Phương thức thanh toán</p>
                        <p>{{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' }}</p>
                    </div>
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Trạng thái thanh toán</p>
                        <p id="payment-status">{{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Số điện thoại</p>
                        <p>{{ $order->phone }}</p>
                    </div>
                    <div class="col mb-3">
                        <p class="small text-muted mb-1">Địa chỉ nhận hàng</p>
                        <p>{{ $order->address }}</p>
                    </div>
                    </div>

                    <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                    @foreach ($orderItems as $orderItem)
                        <div class="row">
                            <div class="col-md-8 col-lg-9">
                                <p> {{ $orderItem->quantity }} {{ $orderItem->product->name }}</p>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <p style="white-space: nowrap">{{ number_format($orderItem->quantity * $orderItem->product->price) }} đ</p>
                            </div>
                        </div>  
                    @endforeach
                    

                    <div class="row my-4">
                    <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                        <p class="lead fw-bold mb-0 " style="color: #f37a27;white-space: nowrap">{{ number_format($order->price) }} đ</p>
                    </div>
                    </div>

                    <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Trạng thái đơn: {{ $order->status == 'pending' ? 'Chờ xác nhận' : ($order->payment_status == 'shipping' ? 'Đang giao hàng' : 'Đã giao hàng') }}</p>

                


                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/color.js') }}">
       
    </script>
@endsection