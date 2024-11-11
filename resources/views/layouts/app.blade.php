<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">My Shop</a>
        <a class="navbar-brand" href="{{ route('admin.categories.index') }}">Admin Panel</a>
        </div>
</nav>

    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-image, .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(Auth::check())
      <!-- Hiển thị email và nút Đăng xuất nếu người dùng đã đăng nhập -->
      <p>Xin chào, {{ Auth::user()->email }}</p>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="nav-button">Đăng xuất</button>
    </form>
@else
    <!-- Hiển thị các liên kết đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
    <a href="{{ route('login') }}" class="nav-button" >Đăng nhập</a>
   <p> Chưa có tài khoản? <a href="{{ route('register') }}" class="nav-button"> Đăng ký</a> </p>
@endif

<body>
    
    
    <div class="container mt-4">
        @yield('content')
    </div>
    
</body>



</html>
