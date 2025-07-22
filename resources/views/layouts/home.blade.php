<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Trang chủ')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #eee">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('costomer.profile.index') }}">
                @auth
                    <img src="{{ isset(Auth::user()->image) ? asset('uploads/'.Auth::user()->image) : 'https://www.w3schools.com/bootstrap5/img_avatar1.png' }}" alt="Avatar" style="width:40px;"
                    class="rounded-pill">
                @else
                    <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Avatar" style="width:40px;"
                    class="rounded-pill">
                @endauth
            </a>

			<form class="d-flex d-md-none" action="{{ route('costomer.products.index') }}">
                    <input style="font-size: 10px; padding: 5px;" class="form-control form-control-sm me-2" name="search" type="text" placeholder="Search"
                        value="{{ request('search') }}">
                    <button class="btn btn-info" type="submit">Search</button>
            </form>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
				
                <ul class="navbar-nav me-auto d-flex gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('costomer.home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('costomer.products.index') }}">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('costomer.cart.view') }}">Giỏ hàng</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="btn btn-danger" href="{{ route('logout') }}">Đăng xuất</a>
                        @else
                            <a class="btn btn-info" href="{{ route('login') }}">Đăng nhập</a>
                        @endauth
                    </li>
                </ul>
                <form class="d-none d-md-flex" action="{{ route('costomer.products.index') }}">
                    <input  class="form-control me-2" name="search" type="text" placeholder="Search"
                        value="{{ request('search') }}">
                    <button class="btn btn-info" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-dark text-white text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0" style="border-right: 1px solid white">
                    <h5 class="text-uppercase">Laravel</h5>
                    <p>
                        Trang web được xây dựng bằng framework Laravel
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="border-right: 1px solid white">
                    <h5 class="text-uppercase">Liên kết mạng xã hội</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Facebook</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Tiktok</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Youtube</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">X</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Chính sách</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Chính sách mua hàng</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Chính sách thanh toán</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Chính sách đổi trả</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Nguyễn Văn Toàn</a>
            <address>66 Hồng Ngự, Đồng Tháp, VN</address>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
