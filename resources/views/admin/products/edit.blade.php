@extends('layouts.app')
@section('products', 'active')
@section('content')
    <h1>Sửa sản phẩm</h1>
    @include('admin.products.form', ['action' => route('admin.products.update', $product), 'isEdit' => true, 'product' => $product])
@endsection
