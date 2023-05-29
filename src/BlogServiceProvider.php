<?php

namespace Foundationapp\Blog;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'blog');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/blog.php' => config_path('blog.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blog'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/blog'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/blog'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
        Livewire::component('dashboard', \Foundationapp\Blog\Components\Dashboard::class);
        Livewire::component('post', \Foundationapp\Blog\Components\Post::class);
        Livewire::component('post-list', \Foundationapp\Blog\Components\PostList::class);
        Livewire::component('posts-editor', \Foundationapp\Blog\Components\PostsEditor::class);
        Livewire::component('settings', \Foundationapp\Blog\Components\Settings::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/blog.php', 'blog');

        $this->loadViewsFrom(__DIR__ . '/Views', 'blog');
    }
}
