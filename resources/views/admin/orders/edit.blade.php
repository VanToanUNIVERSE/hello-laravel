@extends('layouts.app')
@section('title', 'Chỉnh sửa đơn hàng ')
@section('content')
    @include('partials.flash')
    <h1 class="text-center">Chỉnh sửa đơn hàng</h1>
    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mt-4">
            <label for="status">Trạng thái đơn hàng</label>
            <select name="status" id="" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="payment_status">Trạng thái đơn hàng</label>
            <select name="payment_status" id="" class="form-control">
                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Chưa thanh toán</option>
            </select>
        </div>
        <button class="btn btn-primary mt-3">Lưu thay đổi</button>
    </form>
@endsection