<x-layouts.main title="Blog">
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-neutral-900 sm:text-4xl">Blog</h2>
                <p class="mt-2 text-lg leading-8 text-neutral-600">
                    Content covering the development, exploration and journey of PXP.
                </p>
                <div class="mt-10 space-y-16 border-t border-neutral-200 pt-10 sm:mt-16 sm:pt-16">
                    @foreach ($posts as $post)
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-sm">
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
                            <div class="group relative">
                                <h3
                                    class="mt-3 text-xl font-semibold leading-6 text-neutral-900 group-hover:text-neutral-600">
                                    <a href="{{ route('blog.show', $post) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 leading-6 text-neutral-600">{{ $post->excerpt }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
