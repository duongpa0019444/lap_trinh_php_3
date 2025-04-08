@extends('admin.admin')
@section('title', 'Dánh sách danh mục tin tức')
@section('content')
<!-- Content -->

    <div class="d-flex justify-content-between align-items-center">
        <h2>Danh sách danh mục tin tức</h2>
        <a href="{{ route('admin.categoryCreate') }}"><button class="btn btn-primary">Thêm danh mục</button></a>
    </div>
    <input type="text" class="form-control my-3" placeholder="Tìm kiếm bài viết...">

    <table class="table table-bordered" id="postTable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('admin.categoryedit', $category->id) }}"><button class="btn btn-warning btn-sm d-inline-block">Sửa</button></a>
                        <form action="{{ route('admin.categorydelete') }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>

@endsection
