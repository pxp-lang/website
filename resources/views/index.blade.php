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
                <div class="sm:mt-24 mx-6 py-12 md:py-0 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-0 lg:w-screen">
                    <pre class="text-sm bg-[#24292e] text-[#e1e4e8] [&_.line-number]:mr-4 leading-loose pl-4 rounded-2xl">
                        <x-torchlight-code language='php'>
                            class Collection<T>
                            {
                                public function __construct(
                                    protected T[] $items = []
                                ) {}

                                public function push(T $item): static
                                {
                                    $this->items[] = $item;

                                    return $this;
                                }

                                public function all(): T[]
                                {
                                    return $this->items;
                                }
                            }
                        </x-torchlight-code>
                    </pre>
                </div>
            </div>
            <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
        </div>
    </div>
</x-layouts.main>
