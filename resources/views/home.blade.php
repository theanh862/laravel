@extends('layouts.app')

@section('content')
    <h1>Danh Sách Danh Mục</h1>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card mb-4">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top category-image" alt="{{ $category->name }}">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top category-image" alt="{{ $category->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Xem Sản Phẩm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
