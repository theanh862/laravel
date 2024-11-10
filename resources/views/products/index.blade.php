@extends('layouts.app')

@section('content')
    <h1>Sản Phẩm trong Danh Mục: {{ $category->name }}</h1>

    @if ($products->isEmpty())
        <p>Không có sản phẩm nào trong danh mục này.</p>
    @else
        <div class="product-list">
            @foreach($products as $product)
                <div class="product-item">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="price">Giá: ${{ $product->price }}</p>
                    <a href="#" class="btn">Xem Chi Tiết</a>
                </div>
            @endforeach
        </div>

        <!-- Nút phân trang -->
        <div class="pagination">
            {{ $products->links() }}
        </div>
    @endif
@endsection
