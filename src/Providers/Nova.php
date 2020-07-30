<?php

namespace GeneaLabs\NovaMultiTenantManager\Providers;

use GeneaLabs\LaravelNovaBlog\Nova\Post;
use Laravel\Nova\Nova as LaravelNova;
use Laravel\Nova\NovaApplicationServiceProvider;

class Nova extends NovaApplicationServiceProvider
{
    protected function resources()
    {
        LaravelNova::resources([
            Post::class,
        ]);
    }

    protected function routes()
    {
        LaravelNova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }
}
