<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->group(function () {
        Route::get(config('blog.route_prefix', 'blog'), \Foundationapp\Blog\Components\PostList::class)->name('blog');
        Route::get(config('blog.route_prefix', 'blog') . '/dashboard/{id?}', \Foundationapp\Blog\Components\PostsEditor::class)->name('blog.dashboard');
        Route::get(config('blog.route_prefix', 'blog') . '/{post_slug}', \Foundationapp\Blog\Components\Post::class)->name('post');
    });
