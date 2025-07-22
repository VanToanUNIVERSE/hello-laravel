<form action={{ $action }} method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <input type="text" name="name" class="form-control mb-2" placeholder="Tên danh mục mới" value="{{ old('name', $category->name ?? '') }}">
    <input name="image" class="form-control" type="file" placeholder="Chọn ảnh">
    <div class="form-check form-control-lg">
        <input class="form-check-input" type="checkbox" name="hot" id="hot" {{ old('hot', $category->hot ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="">Hot</label>
    </div>
    
    <button type="submit">Lưu</button>
</form>