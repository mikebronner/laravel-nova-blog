<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Blog;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class Service extends ServiceProvider
{
    public function boot()
    {
        if (! app("blog")->ignoreMigrations) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');

        // Nova::serving(function (ServingNova $event) {
        //     Nova::script('nova-file-upload-field', __DIR__ . '/../../dist/js/field.js');
        //     Nova::style('nova-file-upload-field', __DIR__ . '/../../dist/css/field.css');
        // });

    }

    public function register()
    {
        $this->app->singleton("blog", function () {
            return app(Blog::class);
        });
        // $this->loadViewsFrom(
        //     __DIR__ . '/../../resources/views',
        //     'laravel-nova-blog'
        // );

        //
    }
}
