@extends('layouts.app')
@section('title','Edit Skill')
@section('content')
<div class="container" style="max-width:700px;padding:35px 20px"><h1>Edit Skill</h1>
<form method="POST" action="{{route('admin.skills.update',$skill)}}">@csrf @method('PUT')
<label>Nama Skill</label><input name="name" value="{{old('name',$skill->name)}}" required>
@error('name')<p style="color:red">{{$message}}</p>@enderror
<label>Level (1–100)</label><input type="number" name="level" min="1" max="100" value="{{old('level',$skill->level)}}" required>
@error('level')<p style="color:red">{{$message}}</p>@enderror
<button type="submit">Update Skill</button></form></div>
@endsection