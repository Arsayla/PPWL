```blade
@csrf

<style>
    .project-form {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .project-form .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .project-form label {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
    }

    .project-form .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #dbe3ef;
        border-radius: 9px;
        background: #fff;
        color: #1e293b;
        font-size: 14px;
        outline: none;
        transition: 0.2s;
        box-sizing: border-box;
    }

    .project-form .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .project-form textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .project-form .form-hint {
        color: #94a3b8;
        font-size: 12px;
    }

    .project-form .form-error {
        color: #dc2626;
        font-size: 12px;
        margin: 0;
    }

    .project-form .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .project-form .upload-box {
        padding: 20px;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        background: #f8fafc;
    }

    .project-form input[type="file"] {
        width: 100%;
        font-size: 13px;
        color: #64748b;
    }

    .project-form .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    .project-form .btn-save {
        background: #1d4ed8;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .project-form .btn-save:hover {
        background: #1e40af;
    }

    .project-form .btn-cancel {
        background: #f1f5f9;
        color: #475569;
        padding: 12px 22px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .project-form .btn-cancel:hover {
        background: #e2e8f0;
    }

    @media (max-width: 600px) {
        .project-form .form-row {
            grid-template-columns: 1fr;
        }

        .project-form .form-actions {
            flex-direction: column-reverse;
        }

        .project-form .btn-save,
        .project-form .btn-cancel {
            text-align: center;
        }
    }
</style>

<div class="project-form">

    {{-- Nama Project --}}
    <div class="form-group">
        <label for="name">Nama Project *</label>

        <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            placeholder="Contoh: VONIC - Voting Online"
            value="{{ old('name', $project->name ?? '') }}"
            required
        >

        @error('name')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Kategori --}}
    <div class="form-group">
        <label for="category_id">Kategori *</label>

        <select
            name="category_id"
            id="category_id"
            class="form-control"
            required
        >
            <option value="">Pilih kategori project</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $project->category_id ?? '') == $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="form-group">
        <label for="description">Deskripsi Project</label>

        <textarea
            name="description"
            id="description"
            class="form-control"
            placeholder="Ceritakan tujuan, fitur, dan proses pengerjaan project..."
        >{{ old('description', $project->description ?? '') }}</textarea>

        @error('description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status dan Thumbnail --}}
    <div class="form-row">

        <div class="form-group">
            <label for="status">Status Project</label>

            <select name="status" id="status" class="form-control">
                <option
                    value="draft"
                    @selected(old('status', $project->status ?? 'draft') == 'draft')
                >
                    Draft
                </option>

                <option
                    value="published"
                    @selected(old('status', $project->status ?? '') == 'published')
                >
                    Published
                </option>
            </select>

            @error('status')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail Project</label>

            <div class="upload-box">
                <input
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    accept="image/*"
                >

                <p class="form-hint">
                    Format gambar JPG, PNG, atau WEBP.
                    Minimal lebar 500 px.
                </p>
            </div>

            @error('thumbnail')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

    </div>

    {{-- Tombol --}}
    <div class="form-actions">
        <a href="{{ route('admin.projects.index') }}" class="btn-cancel">
            Batal
        </a>

        <button type="submit" class="btn-save">
            {{ isset($project) ? 'Simpan Perubahan' : 'Simpan Project' }}
        </button>
    </div>

</div>
```