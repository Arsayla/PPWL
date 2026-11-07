
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Portfolio') | Portfolio</title>
    <meta name="description" content="Personal portfolio website">

    <style>
        :root {
            --ivory: #EDEBDD;
            --red: #810100;
            --burgundy: #630000;
            --black: #181717;
            --white: #fffefa;
            --muted: #77736b;
            --line: #d9d4c5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background: var(--ivory);
            color: var(--black);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, textarea {
            font: inherit;
        }

        .container {
            width: min(1120px, 90%);
            margin: auto;
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(237, 235, 221, .95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--line);
        }

        .nav-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-links a:hover {
            color: var(--red);
        }

        .nav-contact {
            background: var(--red);
            color: white !important;
            padding: 11px 20px;
            border-radius: 5px;
        }

        /* GENERAL */
        .section {
            padding: 95px 0;
        }

        .eyebrow {
            color: var(--red);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .section-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(30px, 4vw, 43px);
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .section-description {
            color: var(--muted);
            max-width: 580px;
            font-size: 15px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 22px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            transition: .2s;
            border: 1px solid var(--red);
        }

        .btn-primary {
            background: var(--red);
            color: white;
        }

        .btn-primary:hover {
            background: var(--burgundy);
            transform: translateY(-2px);
        }

        .btn-outline {
            color: var(--red);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--red);
            color: white;
        }

        /* HERO */
        .hero {
            padding: 90px 0 65px;
            min-height: 570px;
            display: flex;
            align-items: center;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            align-items: center;
            gap: 55px;
        }

        .hero-copy {
            border-left: 2px solid var(--red);
            padding-left: 38px;
        }

        .hero h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1.08;
            letter-spacing: -2px;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--red);
            font-style: italic;
        }

        .hero-text {
            color: #5e5a53;
            font-size: 15px;
            max-width: 460px;
            margin-bottom: 28px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-photo {
            min-height: 390px;
            background: linear-gradient(145deg, #d6d0bd, #b6aa96);
            border-radius: 180px 180px 12px 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .photo-placeholder {
            width: 76%;
            height: 85%;
            border: 1px solid rgba(255,255,255,.5);
            border-radius: 150px 150px 8px 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #51483e;
            background: rgba(237,235,221,.25);
            text-align: center;
        }

        .photo-placeholder strong {
            font-family: Georgia, serif;
            font-size: 52px;
        }

        .photo-placeholder small {
            letter-spacing: 2px;
            font-size: 10px;
        }

        .social-links {
            display: flex;
            gap: 20px;
            margin-top: 35px;
            color: var(--red);
            font-size: 13px;
            font-weight: bold;
        }

        /* STATS */
        .stats {
            background: var(--burgundy);
            color: white;
            padding: 28px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            text-align: center;
            gap: 20px;
        }

        .stat-number {
            font-family: Georgia, serif;
            font-size: 32px;
            font-weight: bold;
        }

        .stat-label {
            color: #eadbd5;
            font-size: 12px;
        }

        /* ABOUT */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 65px;
            align-items: center;
        }

        .about-art {
            min-height: 330px;
            border-radius: 10px;
            background:
                linear-gradient(135deg, rgba(99,0,0,.78), rgba(24,23,23,.75)),
                repeating-linear-gradient(45deg, #c7bba7, #c7bba7 2px, #ded5c5 2px, #ded5c5 8px);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 30px;
        }

        .about-art span {
            font-family: Georgia, serif;
            font-size: 38px;
            font-style: italic;
        }

        .about-copy p {
            color: var(--muted);
            margin: 15px 0 25px;
            font-size: 14px;
        }

        /* SKILLS */
        .skills-section {
            background: #e5e1d2;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 35px;
        }

        .skill-card {
            background: var(--white);
            border: 1px solid var(--line);
            padding: 23px;
            border-radius: 8px;
        }

        .skill-card h3 {
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 18px;
            margin-bottom: 7px;
        }

        .skill-card p {
            color: var(--muted);
            font-size: 12px;
        }

        /* PROJECTS */
        .project-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 32px;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .project-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 9px;
            overflow: hidden;
            transition: .25s;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(24,23,23,.08);
        }

        .project-image {
            height: 205px;
            background: #d5cdbd;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .project-placeholder {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--burgundy);
            font-family: Georgia, serif;
            font-size: 22px;
        }

        .project-info {
            padding: 20px;
        }

        .project-category {
            color: var(--red);
            text-transform: uppercase;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .project-info h3 {
            font-family: Georgia, serif;
            font-size: 19px;
            margin: 7px 0;
        }

        .project-info p {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 15px;
        }

        .project-link {
            color: var(--red);
            font-size: 12px;
            font-weight: bold;
        }

        .empty-project {
            grid-column: 1 / -1;
            padding: 35px;
            text-align: center;
            background: var(--white);
            border-radius: 8px;
            color: var(--muted);
        }

        /* CONTACT */
        .contact-section {
            background: var(--burgundy);
            color: white;
        }

        .contact-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .contact-section .eyebrow {
            color: #e7c9bc;
        }

        .contact-section .section-description {
            color: #eadbd5;
        }

        .contact-section .btn {
            border-color: white;
            color: white;
            white-space: nowrap;
        }

        .contact-section .btn:hover {
            background: white;
            color: var(--burgundy);
        }

        /* FOOTER */
        .footer {
            padding: 23px 0;
            background: var(--ivory);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            color: var(--muted);
            font-size: 12px;
        }

        .footer strong {
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 18px;
        }

        /* RESPONSIVE */
        @media(max-width: 800px) {
            .nav-inner {
                padding: 15px 0;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-links {
                width: 100%;
                gap: 17px;
                flex-wrap: wrap;
            }

            .nav-links a {
                font-size: 12px;
            }

            .hero-grid, .about-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 55px;
            }

            .hero-photo {
                min-height: 300px;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .project-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 540px) {
            .section {
                padding: 65px 0;
            }

            .hero-copy {
                padding-left: 20px;
            }

            .hero h1 {
                font-size: 43px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .project-heading, .contact-inner, .footer-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .skills-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <header class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="logo">PORTFOLIO.</a>

            <nav>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}#home">Home</a></li>
                    <li><a href="{{ route('home') }}#about">About</a></li>
                    <li><a href="{{ route('home') }}#skills">Skills</a></li>
                    <li><a href="{{ route('home') }}#projects">Projects</a></li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                    <li><a href="{{ route('home') }}#contact" class="nav-contact">Let's Talk ↗</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <strong>PORTFOLIO.</strong>
            <span>© {{ date('Y') }} Personal Portfolio. All rights reserved.</span>
            <a href="{{ route('home') }}#home">Back to top ↑</a>
        </div>
    </footer>

</body>
</html>
