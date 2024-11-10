@extends('layouts.app')

@section('content')
    <h1>Sản Phẩm trong Danh Mục: {{ $category->name }}</h1>
    @if($category->products->count())
        <div class="row">
            @foreach($category->products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top product-image" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Giá: </strong>${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Không có sản phẩm nào trong danh mục này.</p>
    @endif
    <a href="{{ route('home') }}" class="btn btn-secondary">Quay Lại</a>
@endsection
