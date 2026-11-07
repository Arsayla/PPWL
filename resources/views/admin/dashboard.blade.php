@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<style>
.admin-wrap{max-width:1180px;margin:36px auto;padding:0 20px;color:#17233d}.admin-head{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:24px}.admin-head h1{margin:0;font-size:30px}.admin-muted{color:#718096}.admin-nav{display:flex;gap:10px;flex-wrap:wrap;margin:18px 0 26px}.admin-nav a{padding:10px 14px;border-radius:9px;background:#eaf0ff;color:#2346a0;text-decoration:none;font-weight:600}.admin-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(145px,1fr));gap:15px}.admin-stat{background:#fff;border:1px solid #e7ebf2;border-radius:14px;padding:20px;box-shadow:0 5px 20px #1d2c4d0a}.admin-stat span{display:block;color:#718096;font-size:13px}.admin-stat strong{display:block;font-size:30px;margin-top:8px}.admin-columns{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:22px}.admin-panel{background:#fff;border:1px solid #e7ebf2;border-radius:14px;padding:20px;box-shadow:0 5px 20px #1d2c4d0a}.admin-panel h2{font-size:18px;margin:0 0 14px}.admin-list{padding:0;margin:0;list-style:none}.admin-list li{padding:11px 0;border-bottom:1px solid #edf0f5}.admin-list li:last-child{border:0}.admin-pill{font-size:12px;border-radius:20px;padding:4px 8px;background:#edf2ff;color:#294ba2}.admin-logout button{border:0;background:#fff0f0;color:#a12b2b;padding:10px 14px;border-radius:9px;cursor:pointer;font-weight:600}@media(max-width:700px){.admin-columns{grid-template-columns:1fr}.admin-head h1{font-size:25px}}
</style>
<div class="admin-wrap">
    <div class="admin-head">
        <div><p class="admin-muted" style="margin:0 0 6px">PPWL / ADMINISTRATION</p><h1>Dashboard Admin</h1><p class="admin-muted" style="margin:6px 0 0">Selamat datang, {{ auth()->user()->name }}. Berikut ringkasan website kamu.</p></div>
        <form class="admin-logout" action="{{ route('logout') }}" method="POST">@csrf<button type="submit">Logout</button></form>
    </div>
    <nav class="admin-nav" aria-label="Navigasi admin">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.projects.index') }}">Manage Projects</a>
        <a href="{{ route('admin.skills.index') }}">Manage Skills</a>
    </nav>
    @if(session('success'))<div style="padding:12px 15px;background:#e8f7ed;color:#176b36;border-radius:9px;margin-bottom:18px">{{ session('success') }}</div>@endif
    <div class="admin-grid">
        @foreach([['Total Projects',$totalProjects],['Published Projects',$published],['Draft Projects',$draft],['Categories',$totalCategories],['Skills',$totalSkills],['Technologies',$totalTechnologies],['Posts',$totalPosts]] as [$label,$value])
            <div class="admin-stat"><span>{{ $label }}</span><strong>{{ $value }}</strong></div>
        @endforeach
    </div>
    <div class="admin-columns">
        <section class="admin-panel"><h2>5 Project Terbaru</h2><ul class="admin-list">
            @forelse($latestProjects as $project)
                <li><strong>{{ $project->name }}</strong><br><span class="admin-muted">{{ $project->category?->name ?? 'Tanpa kategori' }}</span> · <span class="admin-pill">{{ ucfirst($project->status) }}</span></li>
            @empty<li class="admin-muted">Belum ada project. Tambahkan melalui Manage Projects.</li>@endforelse
        </ul></section>
        <section class="admin-panel"><h2>Skill Teratas</h2><ul class="admin-list">
            @forelse($topSkills as $skill)<li><strong>{{ $skill->name }}</strong><span class="admin-muted"> — Level {{ $skill->level }}</span></li>
            @empty<li class="admin-muted">Belum ada data skill.</li>@endforelse
        </ul></section>
        <section class="admin-panel" style="grid-column:1/-1"><h2>Project berdasarkan Kategori</h2><ul class="admin-list">
            @forelse($categories as $category)<li>{{ $category->name }} <span class="admin-muted">— {{ $category->projects_count }} project</span></li>
            @empty<li class="admin-muted">Belum ada kategori.</li>@endforelse
        </ul></section>
    </div>
</div>
@endsection
