@extends('layouts.app')

@section('content')
    <h1>Sửa Danh Mục</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh Danh Mục</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
    </form>
@endsection
