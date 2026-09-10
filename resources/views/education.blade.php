@extends('layouts.app')

@section('title', 'Education')

@section('content')

<section class="page-section">

    <div class="container">

        <div class="section-title">
            <p>MY EDUCATION</p>
            <h1>Pendidikan</h1>
        </div>

        <div class="education-card">

            <div class="education-item">

                <div class="education-icon">
                    🎓
                </div>

                <div>
                    <h2>Universitas Gadjah Mada</h2>

                    <p class="education-year">
                        2025 - Sekarang
                    </p>

                    <p>
                        Program Studi D-IV Teknologi Rekayasa
                        Perangkat Lunak
                    </p>

                    <p>
                        Sekolah Vokasi Universitas Gadjah Mada
                    </p>
                </div>

            </div>

            <div class="education-item">

                <div class="education-icon">
                    🏫
                </div>

                <div>
                    <h2>SMK</h2>

                    <p class="education-year">
                        Pendidikan Menengah
                    </p>

                    <p>
                        Jurusan Teknik Komputer
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection