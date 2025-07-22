@extends('layouts.home')
@section('title', 'Các sản phẩm')
@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-justified flex-md-column">
                    <li class="nav-item p-2">
                        <a class="nav-link border border-primary {{ request('category') == "" ? 'active' : '' }}"
                            href="{{ route('costomer.products.index', ['search' => request('search')]) }}">
                            Tất cả
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item p-2">
                            <a class="nav-link border border-primary {{ request('category') == $category->id ? 'active' : '' }}"
                                href="{{ route('costomer.products.index', ['category' => $category->id, 'search' => request('search')]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row row-cols-1 row-cols-md-4 g-3">
                    @foreach ($products as $product)
                        <div class="col-3">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ asset('uploads/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <p class="card-text">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                                    <a href="{{ route('costomer.products.show', $product) }}" class="btn btn-primary">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
