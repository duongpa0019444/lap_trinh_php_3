<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
            object-position: top;
        }
        .social-icons a {
            margin: 0 10px;
            font-size: 20px;
            color: #007bff;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
