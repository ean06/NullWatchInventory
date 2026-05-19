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
                --cream-dark: #EDE5D4;
                --sepia: #8B6F47;
                --gold: #C9A84C;
                --gold-light: #E8C97A;
                --dark-brown: #2C1810;
                --medium-brown: #5C3D2E;
                --nw-text-primary: #1A1008;
                --nw-text-secondary: #6B4F35;
            }

            /* ===== BASE ===== */
            body.nw-app {
                font-family: 'DM Sans', sans-serif !important;
                background-color: var(--cream) !important;
            }

            /* ===== BACKGROUND ===== */
            .nw-bg-image {
                position: fixed;
                inset: 0;
                z-index: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                opacity: 0.18;
                pointer-events: none;
                user-select: none;
            }

            /* ===== LAYOUT WRAPPER ===== */
            .nw-layout {
                position: relative;
                z-index: 10;
                min-height: 100vh;
            }

            /* ===== NAVBAR ===== */
            /* Override bg-white navbar */
            nav.bg-white,
            .nw-layout nav {
                background-color: rgba(250, 246, 238, 0.95) !important;
                border-bottom: 1px solid rgba(201, 168, 76, 0.25) !important;
                backdrop-filter: blur(6px);
            }

            /* Nav brand/logo link */
            .nw-layout nav a.text-xl,
            .nw-layout nav .shrink-0 a {
                font-family: 'Playfair Display', serif !important;
                font-size: 1.2rem !important;
                font-weight: 400 !important;
                color: var(--nw-text-primary) !important;
                text-decoration: none !important;
            }

            /* Nav links (Desktop) */
            .nw-layout nav a.inline-flex,
            .nw-layout nav .hidden.sm\\:flex a,
            .nw-layout nav .sm\\:flex a {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.75rem !important;
                letter-spacing: 0.1em !important;
                text-transform: uppercase !important;
                color: var(--nw-text-secondary) !important;
                border-bottom-color: transparent !important;
            }

            .nw-layout nav a.inline-flex:hover {
                color: var(--dark-brown) !important;
                border-bottom-color: var(--gold) !important;
            }

            /* Active nav link */
            .nw-layout nav a.border-indigo-400 {
                border-bottom-color: var(--gold) !important;
                color: var(--nw-text-primary) !important;
            }

            /* Nav dropdown button (user name) */
            .nw-layout nav button.inline-flex,
            .nw-layout nav #user-menu-button {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.78rem !important;
                color: var(--nw-text-secondary) !important;
            }

            /* Dropdown menu */
            .nw-layout nav .absolute.right-0 {
                background-color: rgba(250, 246, 238, 0.97) !important;
                border: 1px solid rgba(201, 168, 76, 0.25) !important;
                border-radius: 0 !important;
                box-shadow: 0 4px 20px rgba(44, 24, 16, 0.08) !important;
            }

            .nw-layout nav .absolute.right-0 a,
            .nw-layout nav .absolute.right-0 button {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.78rem !important;
                color: var(--nw-text-secondary) !important;
                letter-spacing: 0.05em !important;
            }

            .nw-layout nav .absolute.right-0 a:hover,
            .nw-layout nav .absolute.right-0 button:hover {
                background-color: rgba(201, 168, 76, 0.1) !important;
                color: var(--dark-brown) !important;
            }

            /* ===== PAGE HEADER ===== */
            .nw-page-header {
                background-color: rgba(250, 246, 238, 0.88) !important;
                border-bottom: 1px solid rgba(201, 168, 76, 0.2) !important;
                box-shadow: none !important;
            }

            .nw-page-header h2 {
                font-family: 'Playfair Display', serif !important;
                font-size: 1.3rem !important;
                font-weight: 400 !important;
                color: var(--nw-text-primary) !important;
                letter-spacing: 0.01em !important;
            }

            /* ===== PAGE CONTENT CARDS ===== */
            /* Override bg-white cards inside pages */
            .nw-layout .bg-white {
                background-color: rgba(250, 246, 238, 0.88) !important;
                border: 1px solid rgba(201, 168, 76, 0.25) !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                position: relative;
            }

            .nw-layout .bg-white::before {
                content: '';
                position: absolute;
                inset: 4px;
                border: 1px solid rgba(201, 168, 76, 0.12);
                pointer-events: none;
                z-index: 0;
            }

            .nw-layout .bg-white > * {
                position: relative;
                z-index: 1;
            }

            /* Text inside cards */
            .nw-layout .text-gray-900 {
                color: var(--nw-text-primary) !important;
                font-family: 'DM Sans', sans-serif !important;
            }

            .nw-layout .text-gray-800 {
                color: var(--nw-text-primary) !important;
            }

            .nw-layout .text-gray-600,
            .nw-layout .text-gray-500 {
                color: var(--nw-text-secondary) !important;
            }

            /* Background gray areas */
            .nw-layout .bg-gray-100,
            .nw-layout .bg-gray-50 {
                background-color: var(--cream) !important;
            }

            /* ===== BUTTONS (global override) ===== */
            .nw-layout button[type="submit"],
            .nw-layout .bg-indigo-600,
            .nw-layout .bg-gray-800 {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.72rem !important;
                font-weight: 500 !important;
                letter-spacing: 0.18em !important;
                text-transform: uppercase !important;
                background-color: var(--dark-brown) !important;
                color: var(--gold-light) !important;
                border-radius: 0 !important;
                border: 1px solid var(--dark-brown) !important;
                box-shadow: none !important;
                transition: background-color 0.2s !important;
            }

            .nw-layout button[type="submit"]:hover,
            .nw-layout .bg-indigo-600:hover,
            .nw-layout .bg-gray-800:hover {
                background-color: var(--medium-brown) !important;
                border-color: var(--medium-brown) !important;
            }

            /* ===== INPUTS (global override) ===== */
            .nw-layout input[type="text"],
            .nw-layout input[type="email"],
            .nw-layout input[type="password"],
            .nw-layout textarea,
            .nw-layout select {
                background: rgba(255, 252, 245, 0.75) !important;
                border: 1px solid rgba(139, 111, 71, 0.35) !important;
                border-radius: 0 !important;
                color: var(--nw-text-primary) !important;
                font-family: 'DM Sans', sans-serif !important;
                box-shadow: none !important;
            }

            .nw-layout input:focus,
            .nw-layout textarea:focus,
            .nw-layout select:focus {
                border-color: var(--gold) !important;
                box-shadow: 0 0 0 2px rgba(201, 168, 76, 0.15) !important;
                outline: none !important;
            }

            /* ===== TABLE (if any) ===== */
            .nw-layout table {
                font-family: 'DM Sans', sans-serif !important;
                font-size: 0.85rem !important;
            }

            .nw-layout th {
                font-size: 0.65rem !important;
                letter-spacing: 0.15em !important;
                text-transform: uppercase !important;
                color: var(--nw-text-secondary) !important;
                border-bottom: 1px solid rgba(201, 168, 76, 0.3) !important;
                background: transparent !important;
            }

            .nw-layout td {
                color: var(--nw-text-primary) !important;
                border-bottom: 1px solid rgba(201, 168, 76, 0.12) !important;
            }

            .nw-layout tr:hover td {
                background-color: rgba(201, 168, 76, 0.05) !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased nw-app">

        <div class="nw-layout">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow-none nw-page-header">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
