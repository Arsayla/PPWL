@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero">

    <div class="container hero-content">

        <div class="hero-text">
            <p class="subtitle">WELCOME TO MY PORTFOLIO</p>

            <h1>
                Hi, I'm <span>Nama Kamu</span>
            </h1>

            <p class="description">
                Saya adalah mahasiswa yang memiliki ketertarikan
                pada pengembangan website, teknologi, dan pemrograman.
            </p>

            <a href="{{ route('about') }}" class="button">
                About Me
            </a>
        </div>

        <div class="hero-card">
            <div class="profile-icon">
                👨‍💻
            </div>

            <h2>Web Developer</h2>
            <p>Learning • Creating • Developing</p>
        </div>

    </div>

</section>

@endsection