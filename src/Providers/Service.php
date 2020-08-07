<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Blog;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        if (! app("blog")->ignoreMigrations) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');
    }

    public function register()
    {
        $this->app->singleton("blog", function () {
            return app(Blog::class);
        });

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'laravel-nova-blog'
        );
    }
}
