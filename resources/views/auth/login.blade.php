<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h2>Đăng nhập</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Đăng nhập</button>
        <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
    </form>
</div>
@endsection
