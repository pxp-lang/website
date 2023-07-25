<x-layouts.docs :title="$doc->title . ' - Documentation'">
    <p class="uppercase font-medium text-sm text-neutral-400">
        {{ $doc->category->format() }}
    </p>

    <h2 class="text-3xl font-semibold mt-2">
        {{ $doc->title }}
    </h2>

    <div class="prose mt-10">
        @markdown($doc->content)

        <div class="mt-10 flex items-center justify-between not-prose">
            @if($previous = $doc->previous())
                <a href="{{ route('docs.show', ['category' => $previous->category, 'slug' => $previous->slug]) }}" class="flex flex-col px-4 gap-y-1 py-2 rounded border border-neutral-200 text-sm max-w-[200px] w-full hover:border-purple-500 transition ease-in-out duration-200">
                    <span class="text-sm font-medium text-neutral-700">&larr; Previous</span>
                    <span>{{ $previous->title }}</span>
                </a>
            @else
                <div></div>
            @endif

            @if($next = $doc->next())
                <a href="{{ route('docs.show', ['category' => $next->category, 'slug' => $next->slug]) }}" class="flex flex-col px-4 gap-y-1 py-2 rounded border border-neutral-200 text-sm max-w-[200px] w-full hover:border-purple-500 transition ease-in-out duration-200">
                    <span class="text-sm font-medium text-neutral-700">Next &rarr;</span>
                    <span>{{ $next->title }}</span>
                </a>
            @else
                <div></div>
            @endif
        </div>
    </div>
</x-layouts.docs>
