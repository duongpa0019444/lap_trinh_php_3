<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <h2 class="mb-3">Danh Sách Tin Tức</h2>
    <a href="{{ route('tin.them') }}"><button class="btn btn-success">Thêm</button></a>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tiêu Đề</th>
                <th>Hình Ảnh</th>
                <th>Ngày Đăng</th>
                <th>Nội Dung</th>
                <th>Lượt Xem</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tins as $key => $tin)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tin->tieuDe }}</td>
                    <td>
                        {{-- <img src="{{ asset('uploads/tin/'.$tin->urlHinh) }}" alt="Hình ảnh" class="img-thumbnail" style="width: 100px;"> --}}
                        <img src="{{ Storage::url($tin->urlHinh) }}" alt="Hình ảnh" class="img-thumbnail" style="width: 100px;">
                    </td>
                    <td>{{ \Carbon\Carbon::parse($tin->ngayDang)->format('d-m-Y') }}</td>
                    <td>{{ Str::limit($tin->noiDung, 50) }}</td>
                    <td>{{ number_format($tin->xem) }}</td>
                    <td>
                        <a href="{{ route('tin.edit',$tin->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('tin.delete') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $tin->id }}">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
