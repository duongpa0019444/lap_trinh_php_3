@extends('admin.admin')
@section('title', 'chỉnh sửa danh mục tin tức')
@section('content')

<h1>Sửa Danh mục</h1>
<form action="{{ route('admin.categoryUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="hidden" name="id" value="{{ $category->id }}">
  <div class="mb-3">
    <label class="form-label">Tên Danh mục</label>
    <input type="text" class="form-control" value="{{ $category->name }}" name="name">
  </div>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <button type="submit" class="btn btn-primary">Sửa danh mục</button>
</form>

@endsection
