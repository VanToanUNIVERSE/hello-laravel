<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/adminFavicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('products')" href="{{ route('admin.products.index') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('users')" href="{{ route('admin.users.index') }}">Người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('categories')" href="{{ route('admin.categories.index') }}">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('orders')" href="{{ route('admin.orders.index') }}">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="btn btn-danger nav-item" href="{{ route('logout') }}">Đăng xuất</a>
                    @endauth
                </li>
            </ul>
            <p class="nav-item">Xin chào {{ Auth::user()->username }}</p>
            
           
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
