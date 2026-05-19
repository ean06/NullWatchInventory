<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NullWatch - Inventory') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Cormorant+Garamond:wght@300;400;500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="images/logo-title.png">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --cream: #F5F0E8;
                --sepia: #8B6F47;
                --gold: #C9A84C;
                --gold-light: #E8C97A;
                --dark-brown: #2C1810;
                --medium-brown: #5C3D2E;
                --nw-text-primary: #1A1008;
                --nw-text-secondary: #6B4F35;
            }

            /* ===== BODY ===== */
            body.nw-guest {
                font-family: 'DM Sans', sans-serif !important;
                background-color: var(--cream) !important;
                position: relative;
                overflow-x: hidden;
            }

            /* ===== BACKGROUND IMAGE ===== */
            .nw-bg-image {
                position: fixed;
                inset: 0;
                z-index: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                opacity: 0.4;
                pointer-events: none;
                user-select: none;
            }

            /* ===== VIGNETTE ===== */
            .nw-vignette {
                position: fixed;
                inset: 0;
                z-index: 1;
                background: radial-gradient(ellipse at center, rgba(245,240,232,0.15) 20%, rgba(245,240,232,0.8) 100%);
                pointer-events: none;
            }

            /* ===== CORNER MARKS ===== */
            .nw-corner {
                position: fixed;
                z-index: 5;
                width: 36px;
                height: 36px;
                opacity: 0.25;
            }
            .nw-corner-tl { top: 20px; left: 20px; border-top: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .nw-corner-tr { top: 20px; right: 20px; border-top: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }
            .nw-corner-bl { bottom: 20px; left: 20px; border-bottom: 1px solid var(--sepia); border-left: 1px solid var(--sepia); }
            .nw-corner-br { bottom: 20px; right: 20px; border-bottom: 1px solid var(--sepia); border-right: 1px solid var(--sepia); }

            /* ===== SCREEN WRAPPER ===== */
            .nw-screen {
                position: relative;
                z-index: 10;
            }

            /* ===== BRAND HEADER ===== */
            .nw-brand-header {
                text-align: center;
                margin-bottom: 0.5rem;
            }

            .nw-ornament {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                margin-bottom: 1rem;
                opacity: 0.5;
            }
            .nw-ornament-line {
                width: 40px;
                height: 1px;
                background: var(--gold);
            }
            .nw-ornament-diamond {
                width: 5px;
                height: 5px;
                background: var(--gold);
                transform: rotate(45deg);
            }

            .nw-brand-label {
                font-family: 'DM Sans', sans-serif;
                font-size: 0.6rem;
                font-weight: 500;
                letter-spacing: 0.38em;
                color: var(--gold);
                text-transform: uppercase;
                margin-bottom: 0.3rem;
                display: block;
            }

            .nw-brand-name {
                font-family: 'Playfair Display', serif;
                font-size: 2.2rem;
                font-weight: 400;
                color: var(--nw-text-primary);
                line-height: 1;
                display: block;
                text-decoration: none;
            }

            .nw-brand-name em {
                font-style: italic;
                color: var(--sepia);
            }

            /* ===== CARD ===== */
            .nw-card {
                background: rgba(250, 246, 238, 0.88) !important;
                border: 1px solid rgba(201, 168, 76, 0.3) !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                position: relative;
                backdrop-filter: blur(4px);
            }

            /* inner border accent */
            .nw-card::before {
                content: '';
                position: absolute;
                inset: 5px;
                border: 1px solid rgba(201, 168, 76, 0.15);
                pointer-events: none;
                z-index: 0;
            }

            /* ===== OVERRIDE BREEZE FORM ELEMENTS ===== */

            /* Labels */
            .nw-card label:not([for="remember_me"]) {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.65rem !important;
                font-weight: 500 !important;
                letter-spacing: 0.2em !important;
                color: var(--nw-text-secondary) !important;
                text-transform: uppercase !important;
            }

            /* Text inputs */
            .nw-card input[type="email"],
            .nw-card input[type="password"],
            .nw-card input[type="text"] {
                background: rgba(255, 252, 245, 0.75) !important;
                border: 1px solid rgba(139, 111, 71, 0.35) !important;
                border-radius: 0 !important;
                color: var(--nw-text-primary) !important;
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.875rem !important;
                box-shadow: none !important;
                transition: border-color 0.2s, box-shadow 0.2s !important;
            }

            .nw-card input[type="email"]:focus,
            .nw-card input[type="password"]:focus,
            .nw-card input[type="text"]:focus {
                border-color: var(--gold) !important;
                background: rgba(255, 252, 248, 0.95) !important;
                box-shadow: 0 0 0 2px rgba(201, 168, 76, 0.15) !important;
                outline: none !important;
            }

            /* Checkbox */
            .nw-card input[type="checkbox"] {
                border-radius: 0 !important;
                border-color: rgba(139, 111, 71, 0.4) !important;
                accent-color: var(--dark-brown) !important;
            }

            /* Remember me label */
            .nw-card label[for="remember_me"] span,
            .nw-card .inline-flex span {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.78rem !important;
                color: var(--nw-text-secondary) !important;
            }

            /* Error messages */
            .nw-card p.text-sm.text-red-600,
            .nw-card .text-red-600 {
                color: #8B2020 !important;
                font-size: 0.72rem !important;
                font-family: 'DM Sans', sans-serif !important;
            }

            /* Forgot password link */
            .nw-card a.text-gray-600,
            .nw-card a.underline {
                font-family: 'Cormorant Garamond', serif !important;
                font-style: italic !important;
                font-size: 0.88rem !important;
                color: var(--nw-text-secondary) !important;
                text-underline-offset: 3px !important;
                letter-spacing: 0.02em !important;
            }

            .nw-card a.text-gray-600:hover,
            .nw-card a.underline:hover {
                color: var(--dark-brown) !important;
            }

            /* Primary button */
            .nw-card button[type="submit"],
            .nw-card .nw-primary-btn {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.72rem !important;
                font-weight: 500 !important;
                letter-spacing: 0.2em !important;
                text-transform: uppercase !important;
                background-color: var(--dark-brown) !important;
                color: var(--gold-light) !important;
                border: 1px solid var(--dark-brown) !important;
                border-radius: 0 !important;
                padding: 0.75rem 1.75rem !important;
                box-shadow: none !important;
                transition: background-color 0.2s, border-color 0.2s !important;
                position: relative !important;
            }

            .nw-card button[type="submit"]:hover {
                background-color: var(--medium-brown) !important;
                border-color: var(--medium-brown) !important;
            }

            /* Session status */
            .nw-card .text-green-600 {
                color: var(--medium-brown) !important;
                font-family: 'Cormorant Garamond', serif !important;
                font-style: italic !important;
            }

            /* ===== DIVIDER LINE between form sections ===== */
            .nw-divider {
                height: 1px;
                background: rgba(201, 168, 76, 0.2);
                margin: 1.25rem 0;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 nw-guest">

        <!-- Background -->
        <img
            src="{{ asset('images/clock-bg.svg') }}"
            alt=""
            class="nw-bg-image"
            aria-hidden="true"
        >
        <div class="nw-vignette"></div>

        <!-- Corner marks -->
        <div class="nw-corner nw-corner-tl"></div>
        <div class="nw-corner nw-corner-tr"></div>
        <div class="nw-corner nw-corner-bl"></div>
        <div class="nw-corner nw-corner-br"></div>

        <div class="flex flex-col items-center min-h-screen pt-6 nw-screen sm:justify-center sm:pt-0">

            <!-- Brand Header -->
            <div class="nw-brand-header">
                <div class="nw-ornament">
                    <div class="nw-ornament-line"></div>
                    <div class="nw-ornament-diamond"></div>
                    <div class="nw-ornament-line"></div>
                </div>
                <a href="/" class="nw-brand-name">
                    <span class="nw-brand-label">Inventory Management</span>
                    Null<em>Watch</em>
                </a>
            </div>

            <!-- Card -->
            <div class="w-full px-6 py-4 mt-6 overflow-hidden nw-card sm:max-w-md">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
