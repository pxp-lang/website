<x-layouts.main title="About">
    <section class="pt-32 lg:pt-48 pb-16 -mt-32 lg:-mt-24 index-hero">
        <div class="space-y-8 max-w-5xl mx-auto w-full px-8 lg:px-0">
            <h1 class="text-4xl lg:text-5xl font-medium tracking-tight underline-offset-4">
                About
            </h1>

            <p class="text-2xl text-neutral-600 tracking-tight">
                Learn more about how the project started, the goals, and the people behind it.
            </p>
        </div>
    </section>

    <section id="what-is-pxp" class="py-2 lg:py-6 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0">
        <h2 class="text-2xl font-medium tracking-tight">
            What is PXP?
        </h2>

        <div class="prose prose-lg">
        @markdown()
PXP (PXP: Extended Preprocessor) is a collection of tools and libraries that aim to make working with the PHP programming language more enjoyable and productive.

The PHP language has been around for nearly 30 years. It has evolved significantly over that time, but we believe that there is still room for improvement. PXP is an attempt to address some of the shortcomings of PHP and make it a more modern, powerful, and developer-friendly language.
        @endmarkdown
        </div>
    </section>

    <section id="how-does-pxp-work" class="py-2 lg:py-6 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0 mt-4">
        <h2 class="text-2xl font-medium tracking-tight">
            How does PXP work?
        </h2>

        <div class="prose prose-lg">
        @markdown()
Well, PXP isn't just one "thing" – it's a set of different tools that work together to provide a better development experience for PHP developers.

PXP's goal is to be fast _and_ reliable. Modern versions of PHP are already pretty fast, but for things like static analysis and autocompletion, we need to be able to parse and understand PHP code quickly.

This is why PXP is developed as a hybrid system, powered by a combination of blazingly fast Rust code and simpler, more flexible PHP code.

Rust is used for the heavy lifting – things like parsing, type inference, etc. PHP is used for the higher-level stuff – code formatting, refactoring, pretty printing, etc.

This does mean that PXP core development sometimes requires knowledge of both Rust and PHP, but we think it's worth it to provide the best possible performance.
        @endmarkdown
        </div>
    </section>

    <section id="how-does-pxp-work" class="py-2 lg:py-6 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0 mt-4">
        <h2 class="text-2xl font-medium tracking-tight">
            What are the different projects / tools / libraries?
        </h2>

        <div class="prose prose-lg">
        @markdown()
### Superset Language

This is where it all started. This project aims to create a new language that is backwards-compatible with PHP, whilst also introducing new languages features and syntax to improve developer experience.

Here are a few examples of what the superset language might look like:

**Multi-line short closures**

```php
$add = fn (int $a, int $b) {
    // ...
};
```

**Type aliases**

```hack
type Label = string | Closure | null;

trait HasLabel
{
    protected Label $label;

    public function label(Label $label)
    {
        //
    }

    public function getLabel(): Label
    {
        return $this->label;
    }
}
```

**Generics**

```hack
class Collection<K, V> implements ArrayAccess<K, V>
{
    protected array<K, V> $items = [];

    public function offsetGet(K $key): V
    {
        return $this->items[$key];
    }

    // ...
}
```

**Pattern matching**

```php
$point = new Point(x: 1, y: 2);

echo match ($point) {
    Point { y: 1 } => 'Y is 1!',
    Point { y: $y } => "Y is {$y}!",
}
```

### Language Server

A language server is a tool that provides your code editor with information about your code. It's the thing that powers stuff like autocomplete, go-to definition, and refactoring.

Since PXP involves building a new superset language, we need a language server to provide all of the cool features that you'd expect from a modern code editor. A super fast, super reliable language server is essential for a good developer experience, so we're putting a lot of effort into making sure that ours is the best it can be.

The fact that we're creating a superset language also means that this project benefits **all** PHP developers, not just those using PXP.

### Static Analyser

Building a static analyser is also a big part of the project. A language server requires some form of type inference (or type deduction). If we're already doing that, we might as well build a static analyser too!

Hopefully by now you can start to see how all of these projects fit together and how much code can be shared between them.

### Code Formatter & Linter

Again, we're building a new language, so we need a way to make our code look _gooooood_. Much like the language server and static analyser, the code formatter and linter will be built on top of the same core libraries.

It won't just help PXP users, it will help all PHP developers.
        @endmarkdown
        </div>
    </section>

    <section id="how-does-pxp-work" class="py-2 lg:py-6 space-y-8 max-w-5xl w-full mx-auto px-8 lg:px-0 mt-4">
        <h2 class="text-2xl font-medium tracking-tight">
            Who is behind PXP?
        </h2>

        <div class="prose prose-lg">
        @markdown()
Hey, my name is [Ryan](https://twitter.com/ryangjchandler)! I'm the person behind PXP. I've been a PHP developer for quite a few years now, but I've always been incredibly interested in other fields of software development such as programming language design, compilers, and static analysis.

I started PXP as a way to scratch my own itch – I wanted a better development experience when working with PHP, and I thought that the best way to achieve that was to build the tools myself.

It's just me working on the project right now, but once things start to take off, I'm hopeful that I'll be able to bring more people on board to help out.
        @endmarkdown
        </div>
    </section>
</x-layouts.main>
