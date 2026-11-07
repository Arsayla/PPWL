<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .nav-links { display:flex; align-items:center; gap:20px; flex-wrap:wrap; }
        .nav-links a { text-decoration:none; }
        .nav-button { border:0; background:transparent; color:inherit; font:inherit; cursor:pointer; }
        .flash-message { max-width:1100px; margin:18px auto 0; padding:12px 16px; border-radius:8px; background:#e8f7ed; color:#176b36; }
        .content-container { max-width:1100px; margin:40px auto; padding:0 20px; }
        .table-card { background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 5px 25px rgba(30,46,90,.06); }
        .post-toolbar { display:flex; gap:10px; flex-wrap:wrap; padding:20px; border-bottom:1px solid #edf0f5; }
        .post-toolbar input,.post-toolbar select { padding:10px 12px; border:1px solid #dce2ec; border-radius:8px; }
        .post-toolbar button,.primary-link { padding:10px 16px; border:0; border-radius:8px; background:#354da0; color:#fff; text-decoration:none; cursor:pointer; }
        .post-table { width:100%; border-collapse:collapse; background:#fff; }
        .post-table th,.post-table td { padding:15px 20px; text-align:left; border-bottom:1px solid #edf0f5; }
        .post-table th { background:#f7f9fd; color:#66738a; font-size:12px; text-transform:uppercase; }
        .post-pagination { padding:20px; }
        .login-card { max-width:440px; margin:65px auto; padding:30px; background:#fff; border-radius:14px; box-shadow:0 8px 30px #0001; }
        .login-card label { display:block; margin:14px 0 6px; }
        .login-card input { width:100%; padding:11px; border:1px solid #ccd4e0; border-radius:8px; }
        .login-card button { width:100%; margin-top:20px; padding:12px; border:0; border-radius:8px; color:white; background:#2857d9; cursor:pointer; }
        @media(max-width:700px){ .nav-container{gap:14px; flex-direction:column;} .nav-links{justify-content:center;gap:12px;} }
    </style>
</head>
<body>
    @include('partials.navbar')
    @if(session('success'))
        <div class="flash-message">{{ session('success') }}</div>
    @endif
    <main>@yield('content')</main>
    @include('partials.footer')
</body>
</html>
