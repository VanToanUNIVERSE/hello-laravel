<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <input type="text" name="username" class="form-control mb-2" placeholder="Tên đăng nhập" value="{{ old('username', $user->username ?? '') }}">
    <input type="password" name="password" class="form-control mb-2" placeholder="Mật khẩu mới">
    <input type="text" name="fullName" class="form-control mb-2" placeholder="Họ tên" value="{{ old('fullName', $user->fullName ?? '') }}">
    <input type="text" name="address" class="form-control mb-2" placeholder="Địa chỉ" value="{{ old('address', $user->address ?? '') }}">
    <input type="text" name="phone" class="form-control mb-2" placeholder="Số điện thoại" value="{{ old('phone', $user->phone ?? '') }}">
    <input type="file" name="image" class="form-control mb-2" placeholder="Chọn ảnh">
    <button class="btn btn-primary" type="submit">Lưu</button>
</form>