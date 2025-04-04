@extends('admin.admin')

@section('content')
<!-- Content -->

    <div class="d-flex justify-content-between align-items-center">
        <h2>Danh sách tin tức</h2>
        <a href="{{ route('admin.newsCreate') }}"><button class="btn btn-primary">Thêm Tin tức</button></a>
    </div>
    <input type="text" class="form-control my-3" placeholder="Tìm kiếm bài viết...">

    <table class="table table-bordered" id="postTable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Mô tả ngắn</th>
                <th>Chi tiết</th>
                <th>Ảnh đại diện</th>
                <th>Danh mục</th>
                <th>Ngày đăng</th>
                <th>Lượt xem</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $news_item)
                <tr>
                    <td>{{$news_item->id}}</td>
                    <td><div class="truncate-text">{{ $news_item->title }}</div></td>
                    <td><div class="truncate-text">{{ $news_item->description_short }}</div></td>
                    <td><div class="truncate-text">{{ $news_item->description }}</div></td>
                    <td><img src="{{ Storage::url($news_item->image) }}" width="100"></td>
                    <td>{{ $news_item->category }}</td>
                    <td>{{ $news_item->created_at }}</td>
                    <td>{{ $news_item->views }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Sửa</button>
                        <form action="{{ route('admin.delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $news_item->id }}">
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

@endsection
