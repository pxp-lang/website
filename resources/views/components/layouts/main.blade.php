@props(['title' => null, 'withHeader' => true])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Primary Meta Tags -->
    <meta name="title" content="PXP: Extended Preprocessor" />
    <meta name="description" content="A suite of high-performance tools for PHP developers – includes a code formatter, static analyser, language server and superset language." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="PXP: Extended Preprocessor" />
    <meta property="og:description" content="A suite of high-performance tools for PHP developers – includes a code formatter, static analyser, language server and superset language." />
    <meta property="og:image" content="{{ asset('og.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title" content="PXP: Extended Preprocessor" />
    <meta property="twitter:description" content="A suite of high-performance tools for PHP developers – includes a code formatter, static analyser, language server and superset language." />
    <meta property="twitter:image" content="{{ asset('og.png') }}" />

    @isset($title)
        <title>{{ $title }} | PXP: Extended Preprocessor</title>
    @else
        <title>PXP: Extended Preprocessor</title>
    @endisset

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="JONZZUWT" defer></script>
        <!-- / Fathom -->
    @endproduction
</head>

<body class="antialiased min-h-screen flex flex-col mx-auto">
    @if($withHeader)
        <header class="py-8 flex items-center justify-between max-w-5xl mx-auto w-full z-10 px-8 lg:px-0">
            <a href="{{ route('index') }}" title="PXP: Extended Preprocessor">
                <x-logo class="h-6 w-auto" />
            </a>

            <nav class="flex items-center gap-x-8">
                <a href="{{ route('blog.index') }}" class="font-medium text-lg">
                    Blog
                </a>

                <a href="https://github.com/pxp-lang" class="font-medium text-lg" target="_blank">
                    GitHub
                </a>
            </nav>
        </header>
    @endif

    <main class="flex-1">
        {{ $slot }}
    </main>

    <footer class="w-full max-w-5xl mx-auto px-8 lg:px-0 py-6 text-xs text-neutral-500 text-center">
        &copy; Copyright {{ date('Y') }} <a href="https://ryangjchandler.co.uk" class="underline">Ryan Chandler</a>. All rights reserved.
    </footer>
</body>
</html>
