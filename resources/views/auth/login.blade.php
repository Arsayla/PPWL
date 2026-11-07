@extends('layouts.app')
@section('title', 'Login Admin')
@section('content')
<div class="login-card">
    <p style="color:#2857d9;font-size:13px;font-weight:bold">AREA ADMIN</p>
    <h1 style="margin:5px 0 8px;color:#1e2e5a">Login Admin</h1>
    <p style="color:#718096">Masuk untuk mengelola portfolio dan postingan.</p>
    @if($errors->any())
        <div style="margin-top:15px;padding:10px;background:#fee2e2;color:#991b1b;border-radius:8px">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        <label for="password">Password</label><input id="password" type="password" name="password" required>
        <label style="display:flex;align-items:center;gap:8px"><input type="checkbox" name="remember" value="1" style="width:auto"> Ingat saya</label>
        <button type="submit">Login</button>
    </form>
</div>
@endsection
