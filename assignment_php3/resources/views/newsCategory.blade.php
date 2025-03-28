@extends('client')

@section('title', 'Tin tức theo danh mục')

@section('content')
<!-- Main Content -->
<div class="container my-5">
    <!-- Latest News -->
    <h3 class="mb-4 border-bottom pb-2">{{$category['name']}}</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @if($news->isEmpty())
            <div class="vh-100 w-100">
                <p class="alert alert-warning">Không tìm thấy bài viết nào liên quan!</p>
            </div>
        @endif
        @foreach ($news as $item)
            <div class="col">
                <a href="{{route('newsDetail',['id' => $item->id])}}" class="text-decoration-none">
                    <div class="card h-100 news-card">
                        <span class="badge bg-danger category-badge">NEW</span>
                        <img src="{{ $item->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description_short }}...</p>
                            <div class="post-meta">
                                <small><i class="fas fa-eye"></i>{{ $item->views }} lượt xem</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
