@extends('layouts.app')
@section('title','Kelola Skills')
@section('content')
<div class="container" style="padding:35px 20px"><h1>Kelola Skills</h1><a href="{{route('admin.dashboard')}}">Dashboard</a>
@if(session('success'))<p style="color:green">{{session('success')}}</p>@endif
<table style="width:100%;margin-top:20px"><tr><th>Skill</th><th>Level</th><th>Aksi</th></tr>
@forelse($skills as $skill)<tr><td>{{$skill->name}}</td><td>{{$skill->level}}</td><td><a href="{{route('admin.skills.edit',$skill)}}">Edit</a></td></tr>@empty<tr><td colspan="3">Belum ada skill.</td></tr>@endforelse</table>{{$skills->links()}}</div>
@endsection