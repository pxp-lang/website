<x-layouts.main title="Blog">
    <section class="pt-32 lg:pt-48 pb-16 lg:pb-24 -mt-32 lg:-mt-24 index-hero">
        <div class="space-y-8 max-w-5xl mx-auto w-full px-8 lg:px-0">
            <h1 class="text-4xl lg:text-5xl font-medium tracking-tight underline-offset-4">
                The PXP Blog
            </h1>

            <p class="text-2xl text-neutral-600 tracking-tight">
                Read about the latest news, updates and development progress from the PXP project.
            </p>
        </div>
    </section>

    <section class="py-8 lg:py-12 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0">
        @foreach($posts as $post)
            <article>
                <a href="{{ route('blog.show', $post) }}" class="text-2xl font-semibold tracking-tight hover:underline">
                    {{ $post->title }}
                </a>

                <p class="font-medium mt-2 text-neutral-500">
                    {{ $post->published_at->format('j M Y') }}
                </p>

                <p class="text-lg text-neutral-600 mt-2 tracking-tight">
                    {!! $post->excerpt !!}
                </p>
            </article>
        @endforeach
    </section>
</x-layouts.main>
