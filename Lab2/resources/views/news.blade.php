
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .featured-post {
            height: 400px;
            object-fit: cover;
        }

        .news-card {
            transition: transform 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .category-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 1020;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-nav">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">NEWS24</a>
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
    <!-- Latest News -->
    <h3 class="mb-4 border-bottom pb-2">Tin mới nhất</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($NewsNews as $NewsNew)
            <div class="col">
                <a href="{{route('newsDetail',['id' => $NewsNew->id])}}" class="text-decoration-none">
                    <div class="card h-100 news-card">
                        <span class="badge bg-danger category-badge">NEW</span>
                        <img src="{{ $NewsNew->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $NewsNew->title }}</h5>
                            <p class="card-text">{{ $NewsNew->description_short }}...</p>
                            <div class="post-meta">
                                <small><i class="fas fa-eye"></i>{{ $NewsNew->views }} lượt xem</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

        <!-- Thêm các bài viết khác tương tự -->
    </div>

    <!-- Popular News -->
    <h3 class="mt-5 mb-4 border-bottom pb-2">Tin xem nhiều</h3>
    <div class="row">
        @foreach($moreNewss as $moreNews)
            <div class="col-md-6 col-lg-4 mb-4">
                <a href="{{route('newsDetail',['id' => $moreNews->id])}}" class="card news-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $moreNews->image }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title">{{ $moreNews->title }}</h6>
                                <div class="post-meta">
                                    <small><i class="fas fa-clock"></i>{{ $moreNews->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach


    </div>
</div>
<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2025 NEWS24. Đào Tùng Dương</p>
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

