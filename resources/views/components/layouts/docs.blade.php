@props(['title' => null])

<x-layouts.main :$title>
    <div class="max-w-7xl mx-auto w-full grid grid-cols-4 gap-x-12 mt-12 lg:mt-24 lg:px-8 lg:pb-12">
        <aside class="hidden lg:block col-span-1 border-r border-neutral-400/25">
            @capture($documentationNavigation)
                @foreach($navigation() as $category => $docs)
                    <div class="mb-6">
                        <p class="font-medium text-neutral-800">
                            {{ $category }}
                        </p>

                        <nav class="border-l-2 border-neutral-200 pl-4 mt-2 text-sm flex flex-col gap-y-1 py-1">
                            @foreach($docs as $doc)
                                @php($url = route('docs.show', ['category' => $doc->category, 'slug' => $doc->slug]))

                                <a
                                    href="{{ $url }}"
                                    @class([
                                        'hover:underline hover:text-purple-600 transition ease-in-out duration-200' => $url !== url()->current(),
                                        'underline font-medium text-purple-600' => $url === url()->current(),
                                    ])
                                >
                                    {{ $doc->title }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                @endforeach
            @endcapture

            {{ $documentationNavigation() }}
        </aside>

        <section class="col-span-4 lg:col-span-3 px-6 lg:px-0">
            {{ $slot }}
        </section>
    </div>

    <x-slot name="mobileNavigation">
        <div class="!mt-10">
            {{ $documentationNavigation() }}
        </div>
    </x-slot>
</x-layouts.main>
