@extends('layouts.home')
@section('title', 'Thông tin cá nhân')
@section('content')
 <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('uploads/'.Auth::user()->image) }}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">John Smith</h5>
                            <p class="text-muted mb-1">Số đơn đã mua: {{ $totalOrders }}</p>
                            <p class="text-muted mb-4">Số đơn đang giao: {{ $undeliveredOrders }}</p>                
                @include('costomer.profile.form', ['isEdit' => false])
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead style="background-color: #a39999; color: #333">
                                    <tr>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thanh toán</th>
                                        <th scope="col">Thời gian đặt</th>
                                        <th scope="col">Xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td><a class="btn btn-secondary" href="{{ route('costomer.profile.show', $order->id) }}">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection