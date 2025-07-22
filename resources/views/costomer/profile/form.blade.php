@php
        function formatPhoneNumber($phone)
{
    // Xóa các ký tự không phải số
    $phone = preg_replace('/\D/', '', $phone);

    // Kiểm tra nếu đúng 10 số
    if (strlen($phone) === 10) {
        return preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1 $2 $3', $phone);
    }

    return $phone; // Trả lại nguyên nếu không đủ 10 số
}
@endphp
    
    <form action="{{ route('costomer.profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif
<div class="d-flex justify-content-center mb-2">
    @if(!$isEdit)
    <a href="{{ route('costomer.profile.edit', Auth::user()) }}" style="transition: 0.3s;"  data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-primary ms-1">Edit profile</a>
    @else
             <button type="submit" style="transition: 0.3s;"  data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-primary ms-1">Save</button>
    @endif
                            </div>
                        </div>
                    </div>
                </div>

<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Họ tên</p>
                </div>
                <div class="col-sm-9">
                    @if($isEdit)
                        <input required class="form-control" type="text" name="fullName" value="{{ Auth::user()->fullName }}">
                    @else
                        <p class="text-muted mb-0">{{ Auth::user()->fullName }}</p>
                    @endif  
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    @if($isEdit)
                        <input required class="form-control" type="email" name="email" value="{{ Auth::user()->email }}">
                    @else
                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                    @endif 
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                    @if($isEdit)
                        <input required class="form-control" type="text" name="phone" value="{{ Auth::user()->phone }}" >
                    @else
                        <p class="text-muted mb-0">{{ formatPhoneNumber(Auth::user()->phone) }}</p>
                    @endif 
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Địa chỉ</p>
                </div>
                <div class="col-sm-9">
                    @if($isEdit)
                        <input required type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                    @else
                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                    @endif 
                </div>
            </div>
            @if($isEdit)
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Hình ảnh</p>
                    </div>
                    <div class="col-sm-9">            
                        <input class="form-control" type="file" name="image">           
                    </div>
                </div>
            @endif
        </div>

        </form>
    </div>
</div>

