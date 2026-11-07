@extends('layouts.app')
@section('title', 'Projects')
@section('content')
<section class="page-section"><div class="container">
<div class="section-title"><p>MY WORK</p><h1>Projects</h1></div>
<div class="project-grid">
@forelse($projects as $project)
<div class="project-card">
@if($project->thumbnail)<img src="{{asset('storage/'.$project->thumbnail)}}" alt="{{$project->name}}" style="width:100%;height:190px;object-fit:cover;border-radius:10px;margin-bottom:12px">@endif
<div class="project-number">{{str_pad($loop->iteration,2,'0',STR_PAD_LEFT)}}</div>
<h2>{{$project->name}}</h2><p>{{$project->description}}</p>
<span>{{$project->category->name}}</span>
@if($project->images->isNotEmpty())<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:8px;margin-top:12px">
@foreach($project->images as $image)<figure><img src="{{asset('storage/'.$image->image)}}" alt="{{$image->caption ?: $project->name}}" style="width:100%;height:110px;object-fit:cover;border-radius:8px"><figcaption>{{$image->caption}}</figcaption></figure>@endforeach
</div>@endif
</div>
@empty
<p>Belum ada project yang dipublikasikan.</p>
@endforelse
</div></div></section>
@endsection