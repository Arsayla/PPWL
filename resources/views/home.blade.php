
@extends('layouts.portfolio')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="hero" id="home">
    <div class="container hero-grid">

        <div class="hero-copy">
            <div class="eyebrow">Hello, I'm</div>

            <h1>
                Turning Ideas Into
                <span>Meaningful Solutions.</span>
            </h1>

            <p class="hero-text">
                I'm a Software Engineering Student with a passion for
                building digital experiences and managing projects
                that create real impact.
            </p>

            <div class="hero-buttons">
                <a href="#projects" class="btn btn-primary">
                    View My Work ↗
                </a>

                <a href="#contact" class="btn btn-outline">
                    Contact Me
                </a>
            </div>

            <div class="social-links">
                <a href="https://github.com/" target="_blank">GitHub ↗</a>
                <a href="https://linkedin.com/" target="_blank">LinkedIn ↗</a>
                <a href="#contact">Email ↗</a>
            </div>
        </div>

        <div class="hero-photo">
            <div class="photo-placeholder">
                <strong>ME.</strong>
                <small>YOUR PHOTO GOES HERE</small>
            </div>
        </div>

    </div>
</section>

{{-- STATISTICS --}}
<section class="stats">
    <div class="container stats-grid">

        <div>
            <div class="stat-number">{{ $projects->count() }}+</div>
            <div class="stat-label">Projects Listed</div>
        </div>

        <div>
            <div class="stat-number">2+</div>
            <div class="stat-label">Years of Learning</div>
        </div>

        <div>
            <div class="stat-number">3+</div>
            <div class="stat-label">Areas of Interest</div>
        </div>

        <div>
            <div class="stat-number">100%</div>
            <div class="stat-label">Dedication</div>
        </div>

    </div>
</section>

{{-- ABOUT --}}
<section class="section" id="about">
    <div class="container about-grid">

        <div class="about-copy">
            <div class="eyebrow">About Me</div>

            <h2 class="section-title">
                Passionate about solving problems and creating value.
            </h2>

            <p>
                I am a Software Engineering student who enjoys exploring
                technology, developing creative ideas, and collaborating
                with people to build meaningful solutions.
            </p>

            <p>
                Beyond coding, I am interested in project management,
                teamwork, and turning ideas into real projects.
            </p>

            <a href="#contact" class="btn btn-primary">
                Let's Connect ↗
            </a>
        </div>

        <div class="about-art">
            <span>Creating with purpose.</span>
        </div>

    </div>
</section>

{{-- SKILLS --}}
<section class="section skills-section" id="skills">
    <div class="container">

        <div class="eyebrow">What I Do</div>

        <h2 class="section-title">Skills & Expertise.</h2>

        <p class="section-description">
            A combination of technical knowledge, creative thinking,
            and collaboration skills that I continue to develop.
        </p>

        <div class="skills-grid">

            <div class="skill-card">
                <h3>Web Development</h3>
                <p>Building websites and learning modern web technologies.</p>
            </div>

            <div class="skill-card">
                <h3>Project Management</h3>
                <p>Planning, organizing, and managing project activities.</p>
            </div>

            <div class="skill-card">
                <h3>UI/UX Design</h3>
                <p>Exploring user-friendly and meaningful interfaces.</p>
            </div>

            <div class="skill-card">
                <h3>Communication</h3>
                <p>Collaborating, sharing ideas, and working with teams.</p>
            </div>

        </div>
    </div>
</section>

{{-- PROJECTS --}}
<section class="section" id="projects">
    <div class="container">

        <div class="project-heading">
            <div>
                <div class="eyebrow">Featured Projects</div>

                <h2 class="section-title">Some of my recent work.</h2>

                <p class="section-description">
                    A selection of projects, experiments, and ideas
                    that I have worked on.
                </p>
            </div>

            <a href="{{ route('projects') }}" class="project-link">
                View all projects →
            </a>
        </div>

        <div class="project-grid">

            @forelse($projects as $project)

                <article class="project-card">

                    <div class="project-image">

                        @if($project->thumbnail)
                            <img
                                src="{{ asset('storage/' . $project->thumbnail) }}"
                                alt="{{ $project->name }}"
                            >
                        @else
                            <div class="project-placeholder">
                                {{ $project->name }}
                            </div>
                        @endif

                    </div>

                    <div class="project-info">

                        <span class="project-category">
                            {{ $project->category->name ?? 'Project' }}
                        </span>

                        <h3>{{ $project->name }}</h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($project->description, 110) }}
                        </p>

                        <a href="{{ route('projects') }}" class="project-link">
                            Explore Project →
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty-project">
                    <h3>No projects yet.</h3>
                    <p>Projects will appear here once they are added through the admin dashboard.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

{{-- CONTACT --}}
<section class="section contact-section" id="contact">
    <div class="container contact-inner">

        <div>
            <div class="eyebrow">Get In Touch</div>

            <h2 class="section-title">
                Have a project in mind?
                <br>
                Let's create something meaningful.
            </h2>

            <p class="section-description">
                Feel free to reach out if you have an idea,
                collaboration opportunity, or just want to connect.
            </p>
        </div>

        <a href="mailto:your-email@example.com" class="btn">
            Let's Talk ↗
        </a>

    </div>
</section>

@endsection
