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

<body
    x-data="{
        sponsorModal: false,
        init() {
            this.$watch('sponsorModal', () => {
                if (this.sponsorModal) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = 'auto';
                }
            })
        }
    }"
    class="antialiased min-h-screen flex flex-col mx-auto relative"
>
    @if($withHeader)
        <header class="py-8 flex flex-col gap-y-4 lg:flex-row lg:items-center justify-between max-w-5xl mx-auto w-full z-10 px-8 lg:px-0">
            <a href="{{ route('index') }}" title="PXP: Extended Preprocessor">
                <x-logo class="h-6 w-auto" />
            </a>

            <nav class="flex items-center gap-x-6 lg:gap-x-8">
                <a href="{{ route('about') }}" @class([
                    'font-medium text-lg',
                    'underline' => in_array(Route::currentRouteName(), ['about'])
                ])>
                    About
                </a>

                <a href="{{ route('blog.index') }}" @class([
                    'font-medium text-lg',
                    'underline' => in_array(Route::currentRouteName(), ['blog.index', 'blog.show'])
                ])>
                    Blog
                </a>

                <a href="https://github.com/pxp-lang" class="font-medium text-lg" target="_blank">
                    GitHub
                </a>

                <button type="button" x-on:click="sponsorModal = true" class="flex items-center gap-x-1 bg-black/90 px-2 md:px-2.5 py-1.5 md:py-2 text-white rounded-lg text-sm font-medium hover:bg-black/75 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 group-hover:fill-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>

                    <p>
                        Sponsor the project
                    </p>
                </button>
            </nav>
        </header>
    @endif

    <main class="flex-1">
        {{ $slot }}
    </main>

    <footer class="w-full max-w-5xl mx-auto px-8 lg:px-0 py-6 text-xs text-neutral-500 text-center">
        &copy; Copyright {{ date('Y') }} <a href="https://ryangjchandler.co.uk" class="underline">Ryan Chandler</a>. All rights reserved.
    </footer>

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-show="sponsorModal" x-cloak>
        <div
            x-show="sponsorModal"
            @click="sponsorModal = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 bg-opacity-75 transition-opacity"
        ></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-show="sponsorModal">
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div
                    x-show="sponsorModal"
                    @click.away="sponsorModal = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6"
                >
                    <div class="flex justify-center">
                        <div class="w-10 h-10 bg-black/5 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-black">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                    </div>

                    <p class="text-lg font-medium tracking-tight text-center mt-4">
                        Sponsor the PXP project
                    </p>

                    <p class="text-sm mt-4 text-center text-black/75">
                        If you like what I'm doing and want to support the project, please consider sponsoring.
                    </p>

                    <div class="space-y-2 mt-4">
                        <a href="https://github.com/sponsors/ryangjchandler" target="_blank" class="bg-black block text-white font-medium h-10 leading-10 text-center rounded-lg">
                            Sponsor on GitHub
                        </a>

                        <a href="https://www.buymeacoffee.com/ryangjchandler" target="_blank" class="bg-[#FFDD02] block text-black/90 font-medium h-10 leading-10 text-center rounded-lg">
                            Buy me a coffee
                        </a>
                    </div>

                    <p class="text-sm text-center mt-4 text-black/75">
                        Thank you!
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
