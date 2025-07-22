@extends('layouts.home')
@section('title', 'Trang chủ')
@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide w-50" style="margin: 30px auto" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('uploads/banner1.png') }}" alt="Los Angeles" class="d-block w-100"
                    style="margin: 0 auto">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner2.png') }}" alt="Chicago" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner3.png') }}" alt="New York" class="d-block w-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    {{--   Menu --}}
    <div class="container mt-3 mb-3">
        <div class="row row-cols-1 row-cols-md-4 g-3">
            @foreach ($hotCategories as $hotCategory)
                <div class="col position-relative">
                    <a href="{{ route('costomer.products.index', ['category' => $hotCategory->id]) }}">
                        <img src="{{ asset('uploads/clothes.png') }}" alt="" class="w-100 rounded-3"
                            style="filter: brightness(120%); opacity: 0.6">
                        <p class="text-light position-absolute top-50 start-50 translate-middle text-center fs-3 fw-bold"
                            style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7); white-space: nowrap">{{ $hotCategory->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
