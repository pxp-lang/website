<?php

use App\Models\Documentation;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index', [
    'codeSnippets' => collect(File::files(resource_path('code-snippets')))
        ->map(fn (string $file) => File::get($file))
        ->all(),
])->name('index');

Route::get('/blog', function () {
    return view('blog.index', [
        'posts' => Post::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->get(),
    ]);
})->name('blog.index');

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('blog.show', ['post' => $post]);
})->name('blog.show');

Route::get('/docs', function () {
    return view('docs.index');
})->name('docs.index');

Route::get('/docs/{category}/{slug}', function (string $category, string $slug) {
    $doc = Documentation::query()
        ->where('category', $category)
        ->where('slug', $slug)
        ->firstOrFail();

    return view('docs.show', ['doc' => $doc]);
})
    ->name('docs.show');
