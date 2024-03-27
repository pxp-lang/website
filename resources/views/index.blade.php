<x-layouts.main>
    <section class="pt-32 lg:pt-48 pb-8 -mt-32 lg:-mt-24 index-hero">
        <div class="space-y-8 max-w-5xl mx-auto w-full px-8 lg:px-0">
            <h1 class="text-4xl lg:text-5xl font-medium tracking-tight underline-offset-4">
                A suite of high-performance tools for PHP developers – includes a <u>code formatter</u>, <u>static analyser</u>, <u>language server</u> and <u>superset language</u>.
            </h1>

            <p class="text-2xl max-w-3xl text-neutral-600 tracking-tight">
                PXP is a modern development project that aims to provide a new set of tools for PHP developers, powered by an all-new toolchain written in <span class="font-medium text-[#E43B25]">Rust</span>.
            </p>

            <a href="{{ route('about') }}" class="text-lg md:text-xl bg-black/90 px-4 pt-2 pb-2.5 rounded-lg text-white/90 tracking-tight font-medium inline-block mt-6">
                Learn more about the project
            </a>
        </div>
    </section>

    <section class="py-8 lg:py-24 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0">
        <h2 class="text-2xl font-semibold tracking-tight">
            Goals
        </h2>

        <ol class="list-decimal ml-6 font-bold text-xl space-y-2">
            <li>
                <span class="font-normal">
                    Develop a new <u>language server</u> for PHP that provides a high performance and reliable experience for developers, especially those using editors such as <u>Visual Studio Code</u>, <u>Sublime Text</u>, <u>NeoVim</u>, etc.
                </span>
            </li>

            <li>
                <span class="font-normal">
                    Enhance developer experience and productivity by providing a new superset language that is <u>backwards-compatible</u> with PHP, along with a new <u>static analyser</u> and <u>code formatter</u> for faster development feedback and CI.
                </span>
            </li>

            <li>
                <span class="font-normal">
                    Form an open-source community of people who strive to make the PHP ecosystem better.
                </span>
            </li>
        </ol>
    </section>

    <section class="pb-8 lg:pb-24 space-y-8 max-w-5xl mx-auto w-full px-8 lg:px-0">
        <h2 class="text-2xl font-semibold tracking-tight">
            Helping out
        </h2>

        <div class="text-xl space-y-4">
            <p>
                Want to get your hands dirty and help bring this project to life? We're always looking for new contributors to jump in and help out!
            </p>

            <p>
                The project is still in its early stages, so there are plenty of opportunities to get involved and make a difference.
            </p>

            <p>
                Everything is open-source and developed in public on <a href="https://github.com/pxp-lang" class="underline font-medium decoration-sky-600">GitHub</a>, so feel free to take a look at the code and see if there's anything you'd like to help out with.
            </p>
        </div>
    </section>
</x-layouts.main>
