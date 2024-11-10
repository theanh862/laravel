@extends('layouts.app')

@section('content')
    <h1>Chỉnh Sửa Danh Mục</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên Danh Mục</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($category->image)
                <p>Hình ảnh hiện tại:</p>
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
