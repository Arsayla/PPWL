```blade
@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')
<div class="container" style="max-width: 900px; padding: 40px 20px;">

    <div style="margin-bottom: 28px;">
        <p style="color: #64748b; font-size: 13px; margin-bottom: 8px;">
            Dashboard / Projects / Tambah Project
        </p>

        <h1 style="font-size: 28px; font-weight: 700; color: #172554; margin-bottom: 8px;">
            Tambah Project Baru
        </h1>

        <p style="color: #64748b; margin: 0;">
            Lengkapi informasi project yang ingin ditampilkan pada portfolio.
        </p>
    </div>

    <div style="background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 30px; box-shadow: 0 4px 15px rgba(15,23,42,0.04);">

        <form method="POST"
              action="{{ route('admin.projects.store') }}"
              enctype="multipart/form-data">

            @include('admin.projects._form')

        </form>

    </div>
</div>
@endsection
```