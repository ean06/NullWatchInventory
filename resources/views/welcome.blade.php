<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Null Watch</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Cormorant+Garamond:wght@300;400;500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

        <style>
            *, *::before, *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            :root {
                --cream: #F5F0E8;
                --sepia: #8B6F47;
                --gold: #C9A84C;
                --gold-light: #E8C97A;
                --dark-brown: #2C1810;
                --medium-brown: #5C3D2E;
                --text-primary: #1A1008;
                --text-secondary: #6B4F35;
            }

            html, body {
                height: 100%;
                width: 100%;
            }

            body {
                font-family: 'DM Sans', sans-serif;
                background-color: var(--cream);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            /* ===== BACKGROUND IMAGE ===== */
            .bg-image {
                position: fixed;
                inset: 0;
                z-index: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                opacity: 0.55;
                pointer-events: none;
                user-select: none;
            }

            /* ===== VIGNETTE OVERLAY ===== */
            .vignette {
                position: fixed;
                inset: 0;
                z-index: 2;
                background: radial-gradient(ellipse at center, rgba(245,240,232,0.15) 30%, rgba(245,240,232,0.75) 100%);
                pointer-events: none;
            }

            /* ===== CORNER MARKS ===== */
            .corner {
                position: fixed;
                z-index: 5;
                width: 40px;
                height: 40px;
                opacity: 0.3;
            }
            .corner-tl { top: 24px; left: 24px; border-top: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .corner-tr { top: 24px; right: 24px; border-top: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }
            .corner-bl { bottom: 24px; left: 24px; border-bottom: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .corner-br { bottom: 24px; right: 24px; border-bottom: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }

            /* ===== MAIN CONTENT ===== */
            .content {
                position: relative;
                z-index: 10;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 3rem 2rem;
            }

            /* ===== ORNAMENT ===== */
            .ornament {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 1.5rem;
                opacity: 0.55;
            }
            .ornament-line {
                width: 60px;
                height: 1px;
                background: var(--gold);
            }
            .ornament-diamond {
                width: 6px;
                height: 6px;
                background: var(--gold);
                transform: rotate(45deg);
            }

            /* ===== TYPOGRAPHY ===== */
            .brand-subtitle {
                font-family: 'DM Sans', sans-serif;
                font-size: 0.68rem;
                font-weight: 500;
                letter-spacing: 0.38em;
                color: var(--gold);
                text-transform: uppercase;
                margin-bottom: 0.75rem;
            }

            .brand-name {
                font-family: 'Playfair Display', serif;
                font-size: clamp(3.5rem, 8vw, 6rem);
                font-weight: 400;
                color: var(--text-primary);
                letter-spacing: -0.01em;
                line-height: 1;
                margin-bottom: 0.15em;
            }

            .brand-name em {
                font-style: italic;
                color: var(--sepia);
            }

            .tagline {
                font-family: 'Cormorant Garamond', serif;
                font-size: clamp(1rem, 2vw, 1.2rem);
                font-weight: 300;
                color: var(--text-secondary);
                letter-spacing: 0.1em;
                margin-bottom: 3rem;
                margin-top: 0.5rem;
            }

            /* ===== BUTTONS ===== */
            .btn-group {
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .btn {
                font-family: 'DM Sans', sans-serif;
                font-size: 0.78rem;
                font-weight: 500;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                text-decoration: none;
                padding: 0.85rem 2.5rem;
                border-radius: 0;
                cursor: pointer;
                transition: all 0.25s ease;
                display: inline-block;
                position: relative;
            }

            .btn-primary {
                background: var(--dark-brown);
                color: var(--gold-light);
                border: 1px solid var(--dark-brown);
            }

            .btn-primary::after {
                content: '';
                position: absolute;
                inset: 3px;
                border: 1px solid var(--gold);
                opacity: 0.35;
                transition: opacity 0.25s;
            }

            .btn-primary:hover {
                background: var(--medium-brown);
                border-color: var(--medium-brown);
            }

            .btn-primary:hover::after {
                opacity: 0.65;
            }

            .btn-secondary {
                background: transparent;
                color: var(--dark-brown);
                border: 1px solid var(--sepia);
            }

            .btn-secondary:hover {
                background: rgba(44, 24, 16, 0.06);
                border-color: var(--dark-brown);
            }

            /* ===== FOOTER MARK ===== */
            .footer-mark {
                margin-top: 3.5rem;
                font-family: 'Cormorant Garamond', serif;
                font-size: 0.75rem;
                color: var(--sepia);
                letter-spacing: 0.2em;
                opacity: 0.45;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>

        {{-- Background image - taruh file clock-bg.svg di public/images/ --}}
        <img
            src="{{ asset('images/clock-bg.svg') }}"
            alt=""
            class="bg-image"
            aria-hidden="true"
        >

        <div class="vignette"></div>

        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>

        <main class="content">

            <div class="ornament">
                <div class="ornament-line"></div>
                <div class="ornament-diamond"></div>
                <div class="ornament-line"></div>
            </div>

            <p class="brand-subtitle">Inventory Management</p>

            <h1 class="brand-name">Null<em>Watch</em></h1>

            <p class="tagline">Precision. Control. Clarity.</p>

            <div class="btn-group">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <p class="footer-mark">Est. {{ date('Y') }} &nbsp;&bull;&nbsp; All rights reserved</p>

        </main>

    </body>
</html>
