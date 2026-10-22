<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post - BlogApp</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #263248;
            line-height: 1.6;
        }

        .navbar {
            background: #263b80;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar span {
            font-size: 14px;
            color: #dbe5ff;
        }

        .container {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 28px;
            color: #1e2e5a;
        }

        .subtitle {
            color: #718096;
            font-size: 14px;
            margin-top: 4px;
        }

        .count-badge {
            background: #e0e9ff;
            color: #263b80;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 25px rgba(30, 46, 90, 0.06);
            overflow: hidden;
        }

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: space-between;
            align-items: center;
            padding: 22px;
            border-bottom: 1px solid #edf0f5;
        }

        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            flex: 1;
        }

        input, select {
            padding: 11px 13px;
            border: 1px solid #dce2ec;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #263248;
        }

        input {
            width: 260px;
            max-width: 100%;
        }

        input:focus, select:focus {
            outline: 2px solid #c7d5ff;
            border-color: #526fe0;
        }

        button, .reset-btn {
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .search-btn {
            background: #354da0;
            color: white;
        }

        .search-btn:hover {
            background: #263b80;
        }

        .reset-btn {
            color: #526078;
            background: #edf0f5;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #f7f9fd;
        }

        th {
            color: #66738a;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 16px 22px;
        }

        td {
            padding: 18px 22px;
            border-top: 1px solid #edf0f5;
            font-size: 14px;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        .number {
            color: #7a879b;
            width: 75px;
        }

        .post-title {
            color: #263b80;
            font-weight: bold;
            min-width: 180px;
        }

        .description {
            color: #68758a;
            min-width: 240px;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #718096;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            padding: 22px;
            border-top: 1px solid #edf0f5;
        }

        .info {
            font-size: 13px;
            color: #718096;
        }

        .pagination {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            min-width: 36px;
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #e0e5ee;
            border-radius: 7px;
            text-decoration: none;
            color: #526078;
            font-size: 13px;
        }

        .pagination .active {
            background: #354da0;
            color: white;
            border-color: #354da0;
        }

        .pagination .disabled {
            color: #b5bdca;
            background: #f8f9fc;
        }

        .pagination svg {
            width: 15px;
            height: 15px;
            vertical-align: middle;
        }

        .bottom-note {
            text-align: center;
            padding: 25px;
            color: #98a2b3;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 20px;
            }

            .container {
                margin: 25px auto;
                padding: 0 12px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .toolbar, .footer {
                padding: 16px;
            }

            .search-form {
                width: 100%;
            }

            input {
                width: 100%;
                flex: 1 1 100%;
            }

            th, td {
                padding: 14px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand">BlogApp.</div>
        <span>Dashboard Posting</span>
    </nav>

    <main class="container">
        <div class="page-heading">
            <div>
                <h1>Daftar Post</h1>
                <p class="subtitle">
                    Kelola dan temukan postingan dengan mudah.
                </p>
            </div>

            <div class="count-badge">
                {{ $posts->total() }} Total Post
            </div>
        </div>

        <section class="card">
            <div class="toolbar">
                <form action="{{ route('newpost') }}" method="GET"
                      class="search-form">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari judul post..."
                    >

                    <select name="per_page" aria-label="Jumlah data per halaman">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>
                            5 data
                        </option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>
                            10 data
                        </option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>
                            25 data
                        </option>
                    </select>

                    <button type="submit" class="search-btn">
                        Terapkan
                    </button>

                    <a href="{{ route('newpost') }}" class="reset-btn">
                        Reset
                    </a>
                </form>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Post</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="number">
                                    {{ $posts->firstItem() + $loop->index }}
                                </td>
                                <td class="post-title">
                                    {{ $post->title }}
                                </td>
                                <td class="description">
                                    {{ $post->description ?: 'Belum ada deskripsi.' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty">
                                    Tidak ada postingan yang ditemukan.
                                    Coba kata kunci lain.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <div class="info">
                    @if ($posts->total() > 0)
                        Menampilkan {{ $posts->firstItem() }}
                        – {{ $posts->lastItem() }}
                        dari {{ $posts->total() }} data
                    @else
                        Tidak ada data untuk ditampilkan.
                    @endif
                </div>

                <div class="pagination">
                    {{ $posts->onEachSide(1)->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>

        <div class="bottom-note">
            BlogApp &copy; {{ date('Y') }} — Daftar Post
        </div>
    </main>
</body>
</html>
