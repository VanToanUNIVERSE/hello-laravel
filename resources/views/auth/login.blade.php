<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container shadow-lg col-md-6 p-5  position-absolute top-50 start-50 translate-middle">
        <h2>Đăng nhập</h2>
        <form action="{{ route('postLogin') }}" method="post" >
            @csrf
            <div class="mb-3 mt-3 form-floating">
                
                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập"
                    name="username" value="{{ old('username') }}">
                  <label for="username" class="text-secondary">Tên đăng nhập</label>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                <label for="password" class="text-secondary">Mật khẩu</label>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary position-absolute start-50 translate-middle-x">Đăng nhập</button>
        </form>
        <a href="{{ route('register') }}">Chưa có tài khoản ?</a>
    </div>
    @include('partials.flash')
</body>

</html>
