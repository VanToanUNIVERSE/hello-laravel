@extends('layouts.app');
@section('users', 'active')
<head>
    <title>Quản lý người dùng</title>
</head>
@section('content')
    <h2>Danh sách người dùng</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-3">Thêm người dùng</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã người dùng</th>
                <th>Tên người dùng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->image }}</td>
                
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection