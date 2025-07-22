@extends('layouts.app')
@section('orders', 'active')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <h1>Quản lý đơn hàng</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center align-middle">Mã đơn</th>
                <th class="text-center align-middle">Tên khách hàng</th>
                <th class="text-center align-middle">Giá</th>
                <th class="text-center align-middle">Trạng thái</th>
                <th class="text-center align-middle">Phương thức thanh toán</th>
                <th class="text-center align-middle">Trạng thái thanh toán</th>
                <th class="text-center align-middle">Địa chỉ</th>
                <th class="text-center align-middle">Số điện thoại</th>
                <th class="text-center align-middle">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="text-center align-middle">{{ $order->id }}</td>
                <td class="text-center align-middle" style="white-space: nowrap">{{ $order->user->fullName }}</td>
                <td class="text-center align-middle">{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                <td class="text-center align-middle">{{ $order->status == 'pending' ? 'Chờ xác nhận' : ($order->status == 'shipping' ? 'Đang giao hàng' : 'Đã giao hàng')}}</td>
                <td class="text-center align-middle">{{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' }}</td>
                <td class="text-center align-middle">{{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</td>                
                <td class="text-center align-middle">{{ $order->address }}</td>
                <td class="text-center align-middle">{{ $order->phone }}</td>
                <td class="text-center align-middle">
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-warning btn-sm">Chi tiết đơn</a>
                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa đơn hàng số {{ $order->id }} ?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
