@extends('layouts.app')
@section('categories', 'active')
@section('content')
    <h1>Thêm danh mục</h1>
    @include('admin.categories.form', ['action' => route('admin.categories.store'), 'isEdit' => false])
@endsection