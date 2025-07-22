    @extends('layouts.app')
    @section('orders', 'active')
    @section('title', 'Chi tiết của đơn hàng số ')
    @section('content')
        <h2>Chi tiết đơn</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->product->name }}</td>
                    <td>{{ $orderItem->quantity }}</td>
                    <td>{{ number_format($orderItem->product->price * $orderItem->quantity, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection