<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Threadline Studio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #171512;
            --muted: #6f6a60;
            --paper: #fffdf7;
            --cream: #f5efe2;
            --clay: #c46f48;
            --sage: #73866a;
            --olive: #2f3d31;
            --gold: #d6aa4f;
            --line: rgba(23, 21, 18, .12);
            --shadow: 0 20px 50px rgba(47, 61, 49, .16);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Inter", Arial, sans-serif;
            color: var(--ink);
            background: var(--paper);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255, 253, 247, .92);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(18px);
        }

        .nav {
            width: min(1180px, calc(100% - 32px));
            min-height: 76px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            font-size: 1.2rem;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            color: #fff;
            background: var(--olive);
            border-radius: 50%;
            font-size: .82rem;
            letter-spacing: .08em;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            color: var(--muted);
            font-size: .95rem;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: var(--ink);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icon-button {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--ink);
            background: #fff;
            font-size: 1rem;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .icon-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(23, 21, 18, .1);
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 0 20px;
            border: 1px solid var(--ink);
            border-radius: 6px;
            background: var(--ink);
            color: #fff;
            font-weight: 700;
            white-space: nowrap;
        }

        .button.secondary {
            background: transparent;
            color: var(--ink);
        }

        .section {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .section-title {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 26px;
        }

        .eyebrow {
            margin: 0 0 10px;
            color: var(--clay);
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        h1,
        h2,
        h3,
        p {
            margin-top: 0;
        }

        h1 {
            max-width: 760px;
            margin-bottom: 20px;
            font-size: clamp(3rem, 8vw, 6.9rem);
            line-height: .9;
            letter-spacing: 0;
        }

        h2 {
            margin-bottom: 0;
            font-size: clamp(2rem, 4vw, 3.4rem);
            line-height: 1;
            letter-spacing: 0;
        }

        h3 {
            margin-bottom: 8px;
            font-size: 1.08rem;
        }

        p {
            color: var(--muted);
            line-height: 1.7;
        }

        .site-footer {
            margin-top: 0;
            padding: 56px 0 28px;
            background: var(--ink);
            color: #fff;
            border-top: 1px solid rgba(255, 255, 255, .12);
        }

        .footer-inner {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
            display: grid;
            gap: 32px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr 1.1fr;
            gap: 28px;
            align-items: start;
        }

        .footer-brand {
            gap: 12px;
            margin-bottom: 18px;
        }

        .footer-col h3 {
            margin-top: 0;
            margin-bottom: 16px;
            color: var(--clay);
            font-size: 1.05rem;
            letter-spacing: .02em;
        }

        .footer-col p,
        .footer-contact p {
            margin: 0 0 12px;
            color: rgba(255, 255, 255, .7);
            line-height: 1.8;
        }

        .footer-contact p strong {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        .footer-links {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, .76);
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .footer-form {
            display: grid;
            gap: 12px;
            max-width: 100%;
        }

        .footer-form input {
            height: 48px;
            width: 100%;
            padding: 0 16px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font: inherit;
            background: #fff;
            color: var(--ink);
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, .14);
            font-size: .94rem;
            color: rgba(255, 255, 255, .68);
        }

        .footer-social {
            display: flex;
            gap: 10px;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--clay);
            color: #fff;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .social-icon:hover {
            background: var(--olive);
        }

        @media (max-width: 900px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 820px) {
            .nav {
                min-height: auto;
                padding: 16px 0;
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .nav-links {
                order: 3;
                width: 100%;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .nav-actions .button {
                display: none;
            }

            .section-title,
            .footer-inner {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="@yield('body_class')">
    @hasSection('hide_header')
    @else
    <header class="site-header">
        <nav class="nav" aria-label="Main navigation">
            <a class="brand" href="{{ url('/') }}" aria-label="Threadline Studio home">
                <span class="brand-mark">TS</span>
                <span>Threadline Studio</span>
            </a>

            <div class="nav-links">
                <a href="#new">Home</a>
                <a href="#collections">Product</a>
                <a href="#lookbook">Category</a>
              
            </div>

            <div class="nav-actions">
                <a class="icon-button" href="#" aria-label="Search">&#8981;</a>
                
                <a class="button" href="{{ url('/login') }}">Login</a>
                <a class="button" href="{{ url('/register') }}">Register</a>
            </div>
        </nav>
    </header>
    @endif

    <main>
        @yield('content')
    </main>

    @hasSection('hide_footer')
    @else
    <footer class="site-footer" id="visit">
        <div class="footer-inner">
            <div class="footer-grid">
                <div>
                    <a class="brand footer-brand" href="{{ url('/') }}" aria-label="Threadline Studio home">
                        <span class="brand-mark">TS</span>
                        <span>Threadline Studio</span>
                    </a>
                    <p>Everyday clothing with careful fits, grounded colors, and soft natural textures.</p>
                    <div class="footer-contact">
                        <p><strong>Contact Us</strong></p>
                        <p>+1 (999) 999-9999</p>
                        <p>hello@threadline.test</p>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Information</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">More Search</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Helpful Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Supports</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Subscribe More Info</h3>
                    <p>Get the latest drops, fit notes, and studio updates.</p>
                    <form class="footer-form">
                        <input type="email" placeholder="Enter your email" aria-label="Email address">
                        <button class="button" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-social" aria-label="Social links">
                    <a class="social-icon" href="#" aria-label="Facebook">F</a>
                    <a class="social-icon" href="#" aria-label="Instagram">I</a>
                    <a class="social-icon" href="#" aria-label="Twitter">T</a>
                    <a class="social-icon" href="#" aria-label="Pinterest">P</a>
                </div>
                <p>2018 © Threadline Studio. All rights reserved.</p>
            </div>
        </div>
    </footer>
    @endif
</body>
</html>
