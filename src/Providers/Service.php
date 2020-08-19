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

        if (! Blog::ignoreMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');
    }

    public function register()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'laravel-nova-blog'
        );
    }
}
