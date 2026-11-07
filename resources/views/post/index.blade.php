@extends('layouts.app')
@section('title', 'Daftar Post')
@section('content')
<div class="content-container">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:22px">
        <div><p style="color:#2857d9;font-size:13px;font-weight:bold">MY CONTENT</p><h1 style="color:#1e2e5a;margin:4px 0">Daftar Post</h1><p style="color:#718096">Kelola dan temukan postingan dengan mudah.</p></div>
        <span style="background:#e0e9ff;color:#263b80;padding:9px 15px;border-radius:20px;font-weight:bold">{{ $posts->total() }} Total Post</span>
    </div>
    <div class="table-card">
        <form method="GET" action="{{ route('newpost') }}" class="post-toolbar">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul post...">
            <select name="per_page">@foreach([5,10,25] as $number)<option value="{{ $number }}" @selected($perPage == $number)>{{ $number }} data</option>@endforeach</select>
            <button type="submit">Terapkan</button>
            <a href="{{ route('newpost') }}" style="padding:10px 14px;background:#edf0f5;color:#526078;border-radius:8px;text-decoration:none">Reset</a>
        </form>
        <div style="overflow-x:auto"><table class="post-table">
            <thead><tr><th>No.</th><th>Judul Post</th><th>Deskripsi</th></tr></thead>
            <tbody>
            @forelse($posts as $post)
                <tr><td>{{ $posts->firstItem() + $loop->index }}</td><td style="font-weight:bold;color:#263b80">{{ $post->title }}</td><td style="color:#68758a">{{ $post->description ?: 'Tidak ada deskripsi.' }}</td></tr>
            @empty
                <tr><td colspan="3" style="text-align:center;padding:35px;color:#718096">Post tidak ditemukan.</td></tr>
            @endforelse
            </tbody>
        </table></div>
        <div class="post-pagination">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
