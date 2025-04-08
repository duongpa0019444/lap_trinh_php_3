@extends('index')

@section('content')

    <div class="form-container">

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif



        <div class="form-header">NHẬP THÔNG TIN HỌC SINH</div>
        <div class="form-body">
            <form action="{{ route('hs_store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="hoten" class="form-label">Họ tên học sinh</label>
                    <input type="text" class="form-control" name="hoten" value="{{ old('hoten') }}" placeholder="Nhập họ tên">
                </div>
                <div class="mb-3">
                    <label for="tuoi" class="form-label">giới tính</label>
                    <input type="text" class="form-control" name="gioitinh" value="{{ old('gioitinh') }}" placeholder="giới tính">
                </div>
                <div class="mb-3">
                    <label for="ngaysinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" value="{{ old('ngaysinh') }}" name="ngaysinh">
                </div>
                @if ($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </form>
        </div>
    </div>
@endsection
