<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Nova\Post;
use GeneaLabs\LaravelNovaBlog\Post as PostModel;
use Laravel\Nova\Nova as LaravelNova;
use Laravel\Nova\NovaApplicationServiceProvider;

class Nova extends NovaApplicationServiceProvider
{
    protected function resources()
    {
        Post::$model = PostModel::model();

        (new LaravelNova())->resources([
            Post::class,
        ]);
    }
}
