<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Thêm SweetAlert2 từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .truncate-text {
            width: 200px;  /* Chiều rộng cố định */
            height: 100px; /* Chiều cao cố định */
            overflow-y: auto; /* Hiển thị thanh cuộn dọc khi nội dung vượt quá */
            border: 1px solid #ccc; /* Viền để dễ nhìn */
            padding: 10px;
        }
        #postTable td,th{
            font-size: 12px;
        }
        .sidebar {
    height: 100vh; /* Chiều cao full màn hình */
    background: #343a40;
    color: white;
    position: fixed; /* Giữ sidebar cố định */
    top: 0;
    left: 0;
    width: 250px; /* Điều chỉnh độ rộng nếu cần */
    overflow-y: auto; /* Cho phép cuộn nếu menu quá dài */
}

.sidebar a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
}

.sidebar a:hover {
    background: #495057;
}

/* Điều chỉnh phần nội dung chính để không bị che bởi sidebar */
main {
    margin-left: 250px; /* Dịch nội dung sang phải để tránh bị che */
    padding: 20px;
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar py-3">
                <div class="text-center mb-4">
                    <h4>VNEXPRESS</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#"><i class="fas fa-list"></i> Quản lý danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.newsList') }}"><i class="fas fa-newspaper"></i> Quản lý bài viết</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="text-danger"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-10 py-4">
                <!-- Main Content -->
                @yield('content')
            </main>
        </div>
    </div>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".form-control");
    const tableRows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("keyup", function () {
        const searchText = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const title = row.children[1].textContent.toLowerCase(); // Lấy nội dung cột "Tiêu đề"

            if (title.includes(searchText)) {
                row.style.display = ""; // Hiển thị dòng phù hợp
            } else {
                row.style.display = "none"; // Ẩn dòng không khớp
            }
        });
    });
});
</script>
</html>
