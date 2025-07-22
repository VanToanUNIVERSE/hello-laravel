@extends('layouts.app')
@section('categories', 'active')
@section('content')
    <h1>Sửa sản phẩm</h1>
    @include('admin.categories.form', ['action' => route('admin.categories.update', $category), 'isEdit' => true])
@endsection