<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <input type="text" name="name" class="form-control mb-2" placeholder="Tên sản phẩm" value="{{ old('name', $product->name ?? '') }}">
    <input type="number" name="price" class="form-control mb-2" placeholder="Giá" value="{{ old('price', $product->price ?? '') }}">
    <input type="file" name="image" class="form-control mb-2" placeholder="Chọn ảnh">
    <select class="form-control mb-2" name="category_id" id="">
        <option value="" disabled selected>--Chọn danh mục--</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ isset($product) ?? ''}}
                {{ $product->category_id == $category->id ? 'selected' : '' }}
            >{{ $category->name }}</option>
        @endforeach
        
    </select>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
