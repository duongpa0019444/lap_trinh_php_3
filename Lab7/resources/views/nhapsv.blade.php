@extends('index')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center fw-bold">
                    NHẬP THÔNG TIN SINH VIÊN
                </div>
                <div class="card-body">
                    <form action="{{ route('sv_store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="masv" class="form-label">Mã SV</label>
                            <input type="text" class="form-control" id="masv" name="masv" value="{{ old('masv') }}">
                        </div>

                        <div class="mb-3">
                            <label for="hoten" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="hoten" name="hoten" value="{{ old('hoten') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tuoi" class="form-label">Tuổi</label>
                            <input type="number" class="form-control" id="tuoi" name="tuoi" value="{{ old('tuoi') }}">
                        </div>

                        <div class="mb-3">
                            <label for="ngaysinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh') }}">
                        </div>

                        <div class="mb-3">
                            <label for="cmnd" class="form-label">CMND</label>
                            <input type="text" class="form-control" id="cmnd" name="cmnd" value="{{ old('cmnd') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
