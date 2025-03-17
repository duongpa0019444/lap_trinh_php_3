<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chi tiết tin tức - NEWS24</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .news-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .related-news img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .author-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .author-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">NEWS24</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Trang chủ</a>
                    </li>
                    @foreach($categories as $category):
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newsCate', ['id' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Chi tiết bài viết -->
            <div class="col-md-8">
                <article class="news-detail">
                    <h2 class="mb-4">{{$newsDetail->title}}</h2>
                    <div class="author-info">

                        <div>
                            <p>
                                {{$newsDetail->description_short}}
                            </p>
                            <small class="text-muted">{{$newsDetail->created_at}}</small>
                        </div>
                    </div>
                    <img src="{{$newsDetail->image}}" class="img-fluid w-100 mb-4" alt="Tiêu đề bài viết">
                    <div class="content">

                        <p>
                            {{$newsDetail->description}}
                    </div>
                </article>
            </div>

            <!-- Bài viết liên quan -->
            <div class="col-md-4">
                <h3 class="mb-4">Bài viết liên quan</h3>
                <div class="card mb-3">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Bài viết liên quan 1">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề bài viết liên quan 1</h5>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Bài viết liên quan 2">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề bài viết liên quan 2</h5>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Bài viết liên quan 3">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề bài viết liên quan 3</h5>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 NEWS24. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
