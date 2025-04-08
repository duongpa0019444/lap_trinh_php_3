@extends('admin.admin')
@section('title', 'chỉnh sửa tin tức')
@section('content')

<h1>Sửa Tin tức</h1>
<form action="{{ route('admin.newsUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="hidden" name="id" value="{{ $newsDetail->id }}">
  <div class="mb-3">
    <label class="form-label">Tiêu đề</label>
    <input type="text" class="form-control" value="{{ $newsDetail->title }}" name="title">
  </div>
  @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="mb-3">
    <label class="form-label">Mô tả ngắn</label>
    <textarea name="description_short" class="form-control">{{ $newsDetail->description_short }}</textarea>

  </div>
  @error('description_short')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="mb-3">
    <label class="form-label">Mô tả chi tiết</label>
    <textarea name="description" rows="8" class="form-control">{{ $newsDetail->description }}</textarea>

  </div>
  @error('description')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="mb-3">
    <label class="form-label">Hình ảnh</label>
    <input type="file" class="form-control" name="image">
  </div>
  @error('image')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="mb-3">
    <label class="form-label">Danh mục</label>
    <select name="category" id="" class="form-control">
        <option disabled selected>-Chọn danh mục-</option>
        @foreach($categories as $category)

            <option value="{{ $category->id }}" {{ $newsDetail->category==$category->id?'selected':''}}>{{$category->name}}</option>

        @endforeach
    </select>
  </div>
  @error('category')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <input type="hidden" name="views" value="{{ $newsDetail->views }}">
  <button type="submit" class="btn btn-primary">Sửa tin</button>
</form>

@endsection
