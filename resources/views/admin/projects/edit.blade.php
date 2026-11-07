
@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container" style="max-width: 900px; padding: 35px 20px;">

    {{-- Header --}}
    <div style="margin-bottom: 25px;">
        <p style="color: #64748b; font-size: 13px; margin-bottom: 8px;">
            Dashboard / Projects / Edit
        </p>

        <h1 style="font-size: 28px; font-weight: 700; color: #172554; margin-bottom: 8px;">
            Edit Project
        </h1>

        <p style="color: #64748b;">
            Perbarui informasi project, thumbnail, dan gambar gallery.
        </p>
    </div>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 14px 18px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form edit project --}}
    <div style="background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 25px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(15,23,42,0.04);">

        <h2 style="font-size: 20px; font-weight: 700; color: #172554; margin-bottom: 20px;">
            Informasi Project
        </h2>

        <form method="POST"
              action="{{ route('admin.projects.update', $project) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('admin.projects._form')

        </form>

        {{-- Thumbnail saat ini --}}
        @if($project->thumbnail)
            <div style="margin-top: 25px;">
                <label style="display: block; font-weight: 600; margin-bottom: 10px;">
                    Thumbnail Saat Ini
                </label>

                <img
                    src="{{ asset('storage/' . $project->thumbnail) }}"
                    alt="Thumbnail {{ $project->name }}"
                    style="width: 220px; max-width: 100%; border-radius: 10px; border: 1px solid #e2e8f0;"
                >
            </div>
        @endif

    </div>

    {{-- Gallery --}}
    <div style="background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 25px; box-shadow: 0 4px 15px rgba(15,23,42,0.04);">

        <h2 style="font-size: 20px; font-weight: 700; color: #172554; margin-bottom: 8px;">
            Gallery Project
        </h2>

        <p style="color: #64748b; font-size: 14px; margin-bottom: 20px;">
            Tambahkan hingga maksimal 10 gambar untuk setiap project.
            Gambar harus memiliki lebar minimal 800 px.
        </p>

        {{-- Form upload gallery --}}
        <form
            method="POST"
            action="{{ route('admin.projects.gallery.store', $project) }}"
            enctype="multipart/form-data"
            style="padding: 18px; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; margin-bottom: 20px;"
        >

            @csrf

            <label style="display: block; font-weight: 600; margin-bottom: 10px;">
                Pilih Gambar Gallery
            </label>

            <input
                type="file"
                name="images[]"
                accept="image/jpeg,image/png,image/webp"
                multiple
                required
                style="display: block; width: 100%; margin-bottom: 15px;"
            >

            <button
                type="submit"
                style="background: #2563eb; color: white; border: none; padding: 11px 20px; border-radius: 8px; font-weight: 600; cursor: pointer;"
            >
                Upload Gallery
            </button>

        </form>

        {{-- Pesan error validasi gallery --}}
        @if($errors->has('images') || $errors->has('images.*'))
            <div style="color: #991b1b; background: #fee2e2; padding: 14px 18px; border-radius: 8px; margin-bottom: 20px;">

                <strong>Upload gambar gagal:</strong>

                @foreach($errors->get('images') as $error)
                    <p style="margin: 5px 0;">{{ $error }}</p>
                @endforeach

                @foreach($errors->get('images.*') as $messages)
                    @foreach($messages as $message)
                        <p style="margin: 5px 0;">{{ $message }}</p>
                    @endforeach
                @endforeach

            </div>
        @endif

        {{-- Daftar gambar gallery --}}
        <h3 style="font-size: 17px; font-weight: 700; margin: 25px 0 15px; color: #172554;">
            Daftar Gambar
        </h3>

        @if($project->images->count() > 0)

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 18px;">

                @foreach($project->images as $image)

                    <div style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px;">

                        {{-- Preview gambar --}}
                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            alt="{{ $image->caption ?? 'Gallery ' . $project->name }}"
                            style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 12px;"
                        >

                        {{-- Form update caption --}}
                        <form
                            method="POST"
                            action="{{ route('admin.projects.gallery.caption', [$project, $image]) }}"
                        >

                            @csrf
                            @method('PUT')

                            <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 7px;">
                                Caption Gambar
                            </label>

                            <input
                                type="text"
                                name="caption"
                                value="{{ $image->caption }}"
                                placeholder="Masukkan caption gambar"
                                maxlength="255"
                                style="width: 100%; padding: 9px; border: 1px solid #cbd5e1; border-radius: 7px; margin-bottom: 10px; box-sizing: border-box;"
                            >

                            <button
                                type="submit"
                                style="background: #2563eb; color: white; border: none; padding: 9px 14px; border-radius: 7px; cursor: pointer; width: 100%;"
                            >
                                Simpan Caption
                            </button>

                        </form>

                        {{-- Form hapus gambar --}}
                        <form
                            method="POST"
                            action="{{ route('admin.projects.gallery.destroy', [$project, $image]) }}"
                            style="margin-top: 10px;"
                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus gambar ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                style="background: #dc2626; color: white; border: none; padding: 9px 14px; border-radius: 7px; cursor: pointer; width: 100%;"
                            >
                                Hapus Gambar
                            </button>

                        </form>

                    </div>

                @endforeach

            </div>

        @else

            <div style="padding: 25px; text-align: center; background: #f8fafc; border-radius: 10px; color: #64748b;">
                <p style="margin: 0;">Belum ada gambar gallery untuk project ini.</p>
            </div>

        @endif

    </div>

    {{-- Tombol kembali --}}
    <div style="margin-top: 25px;">
        <a
            href="{{ route('admin.projects.index') }}"
            style="display: inline-block; color: #2563eb; text-decoration: none; font-weight: 600;"
        >
            ← Kembali ke Daftar Project
        </a>
    </div>

</div>
@endsection
