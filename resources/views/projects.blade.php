@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<section class="page-section">

    <div class="container">

        <div class="section-title">
            <p>MY WORK</p>
            <h1>Projects</h1>
        </div>

        <div class="project-grid">

            <div class="project-card">
                <div class="project-number">01</div>

                <h2>Portfolio Website</h2>

                <p>
                    Website portfolio sederhana yang dibuat
                    menggunakan Laravel dan Blade.
                </p>

                <span>Laravel • Blade • CSS</span>
            </div>

            <div class="project-card">
                <div class="project-number">02</div>

                <h2>Photo Studio Website</h2>

                <p>
                    Website pemesanan studio foto yang memiliki
                    fitur booking dan pengelolaan data.
                </p>

                <span>HTML • CSS • PHP • MySQL</span>
            </div>

            <div class="project-card">
                <div class="project-number">03</div>

                <h2>UASify</h2>

                <p>
                    Konsep platform EdTech yang membantu mahasiswa
                    mempersiapkan ujian melalui materi dan fitur
                    pendukung belajar.
                </p>

                <span>UI/UX • Web • EdTech</span>
            </div>

        </div>

    </div>

</section>

@endsection