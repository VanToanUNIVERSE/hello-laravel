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

    <div class="container col-md-6 position-absolute top-50 start-50 translate-middle shadow-lg p-5">
        <h2>Đăng ký</h2>
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="mb-3 form-floating mt-3">
                
                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập"
                    name="username" value="{{ old('username') }}">
                <label class="text-secondary" for="username">Tên đăng nhập</label>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                <label class="text-secondary" for="password">Mật khẩu</label>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-floating">
                
                <input type="password" class="form-control" id="password-confirmation" placeholder="Enter password"
                    name="password_confirmation">
                  <label class="text-secondary" for="password_confirmation">Nhập lại mật khẩu</label>
            </div>
            <button type="submit" class="btn btn-primary position-absolute start-50 translate-middle-x">Đăng ký</button>
        </form>
        <a class="" href="{{ route('login') }}">Đã có tài khoản</a>
    </div>
    @include('partials.flash')
</body>

</html>
