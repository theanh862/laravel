<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h2>Đăng ký</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Trường nhập tên -->
        <div>
            <label for="name">Tên</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Trường nhập email -->
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Trường nhập mật khẩu -->
        <div>
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Trường xác nhận mật khẩu -->
        <div>
            <label for="password_confirmation">Xác nhận mật khẩu</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Nút đăng ký -->
        <button type="submit">Đăng ký</button>

        <!-- Liên kết đến trang đăng nhập -->
        <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
    </form>
</div>
@endsection
