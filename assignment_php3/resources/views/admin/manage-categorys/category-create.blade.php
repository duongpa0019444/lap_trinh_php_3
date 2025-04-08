@extends('admin.admin')
@section('title', 'Thêm danh mục tin tức')
@section('content')

<h1>Thêm danh mục</h1>
<form action="{{ route('admin.categoryStore') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label class="form-label">Tên danh mục</label>
    <input type="text" class="form-control" value="{{ old('name') }}" name="name">
  </div>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <button type="submit" class="btn btn-primary">Thêm Danh mục</button>
</form>

@endsection
