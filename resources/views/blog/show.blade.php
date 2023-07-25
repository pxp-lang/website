<x-layouts.main>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-neutral-900 sm:text-4xl">
                    {{ $post->title }}
                </h2>

                <div class="flex items-center gap-x-4 text-sm mt-6">
                    <time datetime="2020-03-16" class="text-neutral-500">
                        {{ $post->published_at->format('j M Y') }}
                    </time>

                    <span
                        @class([
                            'relative z-10 rounded-full px-3 py-1.5 font-medium',
                            'bg-red-50 text-red-600' => $post->category->color() === 'red',
                            'bg-blue-50 text-blue-600' => $post->category->color() === 'blue',
                        ])>
                        {{ $post->category->name }}
                    </span>
                </div>

                <article class="prose mt-10">
                    @markdown($post->content)
                </article>
            </div>
        </div>
    </div>
</x-layouts.main>
