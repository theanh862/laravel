@extends('layouts.app')

@section('content')
    <h2>Kết quả tìm kiếm cho "{{ request('query') }}"</h2>

    @if($categories->isEmpty())
        <p>Không tìm thấy danh mục nào.</p>
    @else
        <ul>
            @foreach($categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
