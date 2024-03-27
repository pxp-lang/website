<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::view('/about', 'about')->name('about');

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
