<x-layouts.main>
    <div class="bg-white">
        <div class="relative isolate overflow-hidden">
            <div class="mx-auto max-w-7xl pt-10 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:pt-32">
                <div class="px-6 lg:px-0 lg:pt-4">
                    <div class="mx-auto max-w-2xl">
                        <div class="max-w-lg">
                            <h1 class="mt-10 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                                Futuristic PHP development
                            </h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600">
                                PXP is an work-in-progress superset of the PHP programming language with support for new
                                language features and syntax.
                            </p>
                            <div class="mt-10 flex items-center gap-x-6">
                                <a href="#"
                                    class="rounded-md bg-purple-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                                    Documentation
                                </a>
                                <a href="https://github.com/pxp-lang" target="_blank"
                                    class="text-sm font-semibold leading-6 text-gray-900">
                                    View on GitHub
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="{
                    block: 0,
                    total: @js(count($codeSnippets)),
                    next() {
                        if (this.block === (this.total - 1)) {
                            this.block = 0;
                        } else {
                            this.block += 1;
                        }
                    },
                    previous() {
                        if (this.block === 0) {
                            this.block = (this.total - 1)
                        } else {
                            this.block -= 1
                        }
                    }
                }" x-on:keydown.right.document="next()" x-on:keydown.left.document="previous()" class="sm:mt-24 mx-6 py-12 md:py-0 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-0 lg:w-screen">
                    @foreach($codeSnippets as $i => $codeSnippet)
                        <pre class="text-sm bg-[#24292e] text-[#e1e4e8] [&_.line-number]:mr-4 leading-loose pl-4 rounded-2xl" x-show="block === @js($i)" x-cloak>
                            <x-torchlight-code language="hack">{!! $codeSnippet !!}</x-torchlight-code>
                        </pre>
                    @endforeach

                    <div class="flex gap-x-4 mt-4 px-4 items-center">
                        <button type="button" x-on:click="previous()" class="text-xs">
                            &larr;
                        </button>
                        <template x-for="n in total">
                            <button type="button" x-on:click="block = n - 1" class="h-2 rounded-xl w-full" x-bind:class="{ 'bg-purple-600/10': block !== (n - 1), 'bg-purple-600': block === (n - 1) }">
                                <span class="sr-only">Show code block</span>
                            </button>
                        </template>
                        <button type="button" x-on:click="next()" class="text-xs">
                            &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
