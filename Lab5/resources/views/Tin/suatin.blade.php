<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <h2 class="mb-4">Thêm Tin Tức</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('tin.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $tin->id }}">
        <div class="mb-3">
            <label for="tieuDe" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="tieuDe" value="{{ $tin->tieuDe }}" name="tieuDe">
        </div>
        @error('tieuDe')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="tomTat" class="form-label">Tóm tắt</label>
            <textarea class="form-control" id="tomTat" name="tomTat" rows="3">{{ $tin->tomTat }}</textarea>
        </div>
        @error('tomTat')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="urlHinh" class="form-label">URL Hình ảnh</label>
            <input type="text" class="form-control" id="urlHinh" value="{{ $tin->urlHinh }}" name="urlHinh">
        </div>
        @error('urlHinh')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="noiDung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="noiDung" name="noiDung" rows="5">{{ $tin->noiDung }}</textarea>
        </div>
        @error('noiDung')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="idLT" class="form-label">Loại tin</label>
            <select class="form-select" id="idLT" name="idLT">

                @foreach ($loaiTins as $cate )
                    <option value="{{ $cate->id }}" {{ $tin->idLT == $cate->id?'checked':'' }}>{{$cate->ten_loai}}</option>
                @endforeach
            </select>
        </div>
        @error('idLt')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" id="tags" value="{{ $tin->tags }}" name="tags" placeholder="Nhập các tags cách nhau bởi dấu phẩy">
        </div>
        @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Nổi bật</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="noiBat" {{ $tin->anHien=1?'checked':'' }} name="noiBat" value="1">
                <label class="form-check-label" for="noiBat">Có</label>
            </div>
        </div>
        @error('noiBat')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Ẩn/Hiện</label>
            <select class="form-select" id="anHien" name="anHien">
                <option {{ $tin->anHien=1?'checked':'' }} value="1">Hiện</option>
                <option {{ $tin->anHien=0?'checked':'' }} value="0">Ẩn</option>
            </select>
        </div>
        @error('anHien')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Sửa Tin</button>
        <a href="{{ route('tin.list') }}"><button class="btn btn-warning" type="button">Quay lại</button></a>
    </form>
</div>
