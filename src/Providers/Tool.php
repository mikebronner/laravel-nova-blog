<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Http\Middleware\Authorize;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class Tool extends ServiceProvider
{
    public function boot()
    {

        // $this->publishes([
        //     __DIR__ . '/../../config/laravel-nova-blog.php' => config_path('laravel-nova-blog.php')
        // ], 'config');

        // $this->app->booted(function () {
        //     $this->routes();
        // });
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/laravel-nova-blog')
            ->group(__DIR__ . '/../../routes/api.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/laravel-nova-blog.php',
            'laravel-nova-blog'
        );

        // $this->commands(Publish::class);
        // $this->commands(AliasTenant::class);
        // $this->commands(CreateTenant::class);
        // $this->commands(DeleteTenant::class);
    }
}
