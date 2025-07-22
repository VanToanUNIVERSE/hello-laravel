@extends('layouts.app')
@section('users', 'active')
@section('content')
    <h1>Thêm người dùng mới</h1>
    @include('admin.users.form', ['action' => route('admin.users.store'), 'isEdit' => false])
@endsection