@extends('layouts.app')
@section('products', 'active')
@section('content')
    <h1>Thêm sản phẩm</h1>
    @include('admin.products.form', ['action' => route('admin.products.store'), 'isEdit' => false])
@endsection
