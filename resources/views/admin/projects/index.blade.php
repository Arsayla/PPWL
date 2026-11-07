
@extends('layouts.app')

@section('title', 'Daftar Project')

@section('content')
<style>
    .projects-page {
        max-width: 1050px;
        margin: 0 auto;
        padding: 40px 20px 60px;
        color: #172554;
    }

    .projects-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        gap: 15px;
    }

    .projects-heading h1 {
        font-size: 25px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .projects-heading p {
        color: #64748b;
        font-size: 13px;
        margin: 0;
    }

    .project-count {
        background: #e8efff;
        color: #1d4ed8;
        padding: 8px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .projects-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .projects-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 16px 18px;
        border-bottom: 1px solid #e8edf5;
    }

    .projects-toolbar-left,
    .projects-toolbar-right {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .projects-toolbar input,
    .projects-toolbar select {
        border: 1px solid #dbe3ef;
        border-radius: 7px;
        padding: 9px 11px;
        font-size: 12px;
        color: #334155;
        background: white;
    }

    .projects-toolbar input {
        width: 210px;
    }

    .btn-add-project {
        background: #1d4ed8;
        color: white;
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-add-project:hover {
        background: #1e40af;
        color: white;
    }

    .btn-reset {
        background: #f1f5f9;
        color: #475569;
        text-decoration: none;
        padding: 9px 12px;
        border-radius: 7px;
        font-size: 12px;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .projects-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 650px;
    }

    .projects-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 11px;
        font-weight: 700;
        text-align: left;
        padding: 14px 18px;
        white-space: nowrap;
    }

    .projects-table td {
        padding: 14px 18px;
        font-size: 12px;
        color: #334155;
        border-top: 1px solid #edf1f7;
    }

    .projects-table tbody tr:hover {
        background: #fafcff;
    }

    .project-name {
        color: #1e3a8a;
        font-weight: 600;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .status-published {
        background: #dcfce7;
        color: #15803d;
    }

    .status-draft {
        background: #fef3c7;
        color: #a16207;
    }

    .action-group {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        border-radius: 6px;
        padding: 7px 10px;
        font-size: 11px;
        text-decoration: none;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-edit {
        background: #e8efff;
        color: #1d4ed8;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .pagination-area {
        padding: 15px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        border-top: 1px solid #edf1f7;
    }

    .pagination-info {
        font-size: 11px;
        color: #64748b;
    }

    .pagination-area nav {
        font-size: 12px;
    }

    .pagination-area nav svg {
        width: 16px;
        height: 16px;
    }

    .success-message {
        padding: 12px 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        background: #dcfce7;
        color: #166534;
        font-size: 13px;
    }

    .empty-projects {
        text-align: center !important;
        padding: 35px !important;
        color: #94a3b8 !important;
    }

    @media (max-width: 600px) {
        .projects-page {
            padding: 25px 14px;
        }

        .projects-heading {
            align-items: flex-start;
        }

        .projects-toolbar {
            align-items: stretch;
        }

        .projects-toolbar-left,
        .projects-toolbar-right {
            width: 100%;
        }

        .projects-toolbar input {
            width: 100%;
            flex: 1;
        }

        .btn-add-project {
            text-align: center;
        }
    }
</style>

<div class="projects-page">

    {{-- Heading --}}
    <div class="projects-heading">
        <div>
            <h1>Daftar Project</h1>
            <p>Kelola dan pantau seluruh project portfolio dengan mudah.</p>
        </div>

        <div class="project-count">
            {{ $projects->total() }} Total Project
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Project Card --}}
    <div class="projects-card">

        {{-- Toolbar --}}
        <div class="projects-toolbar">

            <div class="projects-toolbar-left">
                <span style="font-size:12px;color:#64748b;">
                    Daftar project
                </span>
            </div>

            <div class="projects-toolbar-right">
                <a href="{{ route('admin.projects.create') }}"
                   class="btn-add-project">
                    + Tambah Project
                </a>

                <a href="{{ route('admin.dashboard') }}"
                   class="btn-reset">
                    Dashboard
                </a>
            </div>

        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="projects-table">
                <thead>
                    <tr>
                        <th style="width:65px;">NO.</th>
                        <th>NAMA PROJECT</th>
                        <th>KATEGORI</th>
                        <th>STATUS</th>
                        <th style="width:150px;">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($projects as $index => $project)
                        <tr>
                            <td>
                                {{ $projects->firstItem() + $index }}
                            </td>

                            <td>
                                <span class="project-name">
                                    {{ $project->name }}
                                </span>
                            </td>

                            <td>
                                {{ $project->category->name ?? 'Tanpa kategori' }}
                            </td>

                            <td>
                                <span class="status-badge {{ $project->status == 'published' ? 'status-published' : 'status-draft' }}">
                                    {{ $project->status }}
                                </span>
                            </td>

                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.projects.destroy', $project) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus project ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="empty-projects">
                                Belum ada project yang ditambahkan.
                                <br><br>
                                Silakan klik tombol Tambah Project.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="pagination-area">

            <div class="pagination-info">
                @if($projects->total() > 0)
                    Menampilkan {{ $projects->firstItem() }}
                    sampai {{ $projects->lastItem() }}
                    dari {{ $projects->total() }} project
                @else
                    Belum ada data project.
                @endif
            </div>

            <div>
                {{ $projects->links() }}
            </div>

        </div>

    </div>

</div>
@endsection
