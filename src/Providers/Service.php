<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Blog;
use GeneaLabs\LaravelNovaBlog\View\Components\Post;
use GeneaLabs\LaravelNovaBlog\View\Components\Posts;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewComponentsAs('laravel-nova-blog', [
            Post::class,
            Posts::class,
        ]);

        if (Blog::runsMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-nova-blog');
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path("views/vendor/laravel-nova-blog")
        ], 'assets');
    }

    public function register()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'laravel-nova-blog'
        );
    }
}
