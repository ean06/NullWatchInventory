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
                --parchment: #EDE5D4;
                --sepia: #8B6F47;
                --gold: #C9A84C;
                --gold-light: #E8C97A;
                --dark-brown: #2C1810;
                --medium-brown: #5C3D2E;
                --text-primary: #1A1008;
                --text-secondary: #6B4F35;
                --border-color: #C9A84C;
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

            /* === BACKGROUND: Vintage Clock Face === */
            .bg-clock {
                position: fixed;
                inset: 0;
                z-index: 0;
                pointer-events: none;
            }

            .bg-clock svg {
                width: 100%;
                height: 100%;
            }

            /* === NOISE TEXTURE === */
            .noise-overlay {
                position: fixed;
                inset: 0;
                z-index: 1;
                opacity: 0.04;
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
                background-repeat: repeat;
                background-size: 128px;
            }

            /* === VIGNETTE === */
            .vignette {
                position: fixed;
                inset: 0;
                z-index: 2;
                background: radial-gradient(ellipse at center, transparent 40%, rgba(44, 24, 16, 0.35) 100%);
                pointer-events: none;
            }

            /* === MAIN CONTENT === */
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

            /* === ORNAMENTAL DIVIDER === */
            .ornament {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 1.5rem;
                opacity: 0.6;
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

            /* === LOGO / BRAND === */
            .brand-subtitle {
                font-family: 'DM Sans', sans-serif;
                font-size: 0.7rem;
                font-weight: 500;
                letter-spacing: 0.35em;
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
                letter-spacing: 0.08em;
                margin-bottom: 3rem;
                margin-top: 0.5rem;
            }

            /* === BUTTONS === */
            .btn-group {
                display: flex;
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .btn {
                font-family: 'DM Sans', sans-serif;
                font-size: 0.8rem;
                font-weight: 500;
                letter-spacing: 0.15em;
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
                opacity: 0.4;
                transition: opacity 0.25s;
            }

            .btn-primary:hover {
                background: var(--medium-brown);
                border-color: var(--medium-brown);
            }

            .btn-primary:hover::after {
                opacity: 0.7;
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

            /* === FOOTER ORNAMENT === */
            .footer-mark {
                margin-top: 3.5rem;
                font-family: 'Cormorant Garamond', serif;
                font-size: 0.75rem;
                color: var(--sepia);
                letter-spacing: 0.2em;
                opacity: 0.5;
                text-transform: uppercase;
            }

            /* === CORNER MARKS === */
            .corner {
                position: fixed;
                z-index: 5;
                width: 40px;
                height: 40px;
                opacity: 0.25;
            }

            .corner-tl { top: 24px; left: 24px; border-top: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .corner-tr { top: 24px; right: 24px; border-top: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }
            .corner-bl { bottom: 24px; left: 24px; border-bottom: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .corner-br { bottom: 24px; right: 24px; border-bottom: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }
        </style>
    </head>
    <body>

        <!-- Background Clock SVG -->
        <div class="bg-clock">
            <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                <!-- Parchment warm BG -->
                <rect width="1000" height="1000" fill="#F0E8D6"/>

                <!-- Outer ring decorative -->
                <circle cx="500" cy="500" r="420" fill="none" stroke="#C9A84C" stroke-width="1" opacity="0.25"/>
                <circle cx="500" cy="500" r="415" fill="none" stroke="#8B6F47" stroke-width="0.5" opacity="0.2"/>
                <circle cx="500" cy="500" r="390" fill="none" stroke="#C9A84C" stroke-width="3" opacity="0.15"/>

                <!-- Main clock face -->
                <circle cx="500" cy="500" r="380" fill="#F5F0E8" opacity="0.7"/>
                <circle cx="500" cy="500" r="375" fill="none" stroke="#8B6F47" stroke-width="1.5" opacity="0.3"/>

                <!-- Roman Numerals at hour positions -->
                <g font-family="'Playfair Display', 'Georgia', serif" font-size="36" fill="#5C3D2E" opacity="0.35" text-anchor="middle" dominant-baseline="central">
                    <text x="500" y="148">XII</text>
                    <text x="695" y="205">I</text>
                    <text x="818" y="340">II</text>
                    <text x="858" y="500">III</text>
                    <text x="818" y="660">IV</text>
                    <text x="695" y="795">V</text>
                    <text x="500" y="855">VI</text>
                    <text x="305" y="795">VII</text>
                    <text x="182" y="660">VIII</text>
                    <text x="142" y="500">IX</text>
                    <text x="182" y="340">X</text>
                    <text x="305" y="205">XI</text>
                </g>

                <!-- Hour tick marks -->
                <g stroke="#8B6F47" opacity="0.3">
                    <!-- Major ticks (hours) -->
                    <g stroke-width="2.5">
                        <line x1="500" y1="130" x2="500" y2="165"/>
                        <line x1="500" y1="835" x2="500" y2="870"/>
                        <line x1="130" y1="500" x2="165" y2="500"/>
                        <line x1="835" y1="500" x2="870" y2="500"/>
                        <line x1="231" y1="231" x2="255" y2="255"/>
                        <line x1="769" y1="231" x2="745" y2="255"/>
                        <line x1="231" y1="769" x2="255" y2="745"/>
                        <line x1="769" y1="769" x2="745" y2="745"/>
                    </g>
                    <!-- Minor ticks (minutes) -->
                    <g stroke-width="1">
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(6 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(12 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(18 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(24 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(36 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(42 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(48 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(54 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(66 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(72 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(78 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(84 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(96 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(102 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(108 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(114 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(126 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(132 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(138 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(144 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(156 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(162 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(168 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(174 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(186 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(192 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(198 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(204 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(216 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(222 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(228 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(234 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(246 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(252 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(258 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(264 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(276 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(282 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(288 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(294 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(306 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(312 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(318 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(324 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(336 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(342 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(348 500 500)"/>
                        <line x1="500" y1="125" x2="500" y2="145" transform="rotate(354 500 500)"/>
                    </g>
                </g>

                <!-- Hour hand (at ~10 o'clock position) -->
                <g opacity="0.2" stroke="#2C1810" stroke-linecap="round">
                    <line x1="500" y1="500" x2="335" y2="285" stroke-width="6"/>
                    <line x1="500" y1="500" x2="510" y2="570" stroke-width="6"/>
                </g>

                <!-- Minute hand (at ~2 o'clock position) -->
                <g opacity="0.2" stroke="#2C1810" stroke-linecap="round">
                    <line x1="500" y1="500" x2="680" y2="210" stroke-width="4"/>
                    <line x1="500" y1="500" x2="480" y2="590" stroke-width="4"/>
                </g>

                <!-- Center dot -->
                <circle cx="500" cy="500" r="8" fill="#8B6F47" opacity="0.3"/>
                <circle cx="500" cy="500" r="4" fill="#C9A84C" opacity="0.4"/>

                <!-- Inner decorative ring -->
                <circle cx="500" cy="500" r="60" fill="none" stroke="#C9A84C" stroke-width="0.5" opacity="0.2"/>
            </svg>
        </div>

        <div class="noise-overlay"></div>
        <div class="vignette"></div>

        <!-- Corner marks -->
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>

        <!-- Main Content -->
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
