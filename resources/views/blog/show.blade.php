<x-layouts.main :title="$post->title">
    <section class="pt-32 lg:pt-48 pb-16 lg:pb-24 -mt-32 lg:-mt-24 index-hero">
        <div class="space-y-8 max-w-5xl mx-auto w-full px-8 lg:px-0">
            <h1 class="text-4xl lg:text-5xl font-medium tracking-tight underline-offset-4">
                {{ $post->title }}
            </h1>

            <p class="text-lg text-neutral-600 tracking-tight">
                {{ $post->published_at->format('j M Y') }}
            </p>

            <p class="text-2xl text-neutral-600 tracking-tight">
                {{ $post->excerpt }}
            </p>
        </div>
    </section>

    <article class="prose mt-10 max-w-5xl mx-auto prose-lg px-8 lg:px-0 pb-8 lg:pb-24">
        @markdown($post->content)
    </article>
</x-layouts.main>
