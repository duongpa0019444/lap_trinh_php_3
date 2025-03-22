
@extends('client')

@section('title')
    Trang thông tin của tôi
@endsection

@section('content')

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="profile-card">
            <img src="{{ asset('img/banthan2.jpg') }}" alt="Avatar" class="profile-img">
            <h3>ĐÀO TÙNG DƯƠNG</h3>
            <p class="text-muted">Web Developer</p>
            <p>Chào mừng đến với trang cá nhân của tôi! Tôi là một lập trình viên đam mê công nghệ và sáng tạo.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
            <button class="btn btn-primary mt-3">Liên hệ</button>
        </div>
    </div>
@endsection
