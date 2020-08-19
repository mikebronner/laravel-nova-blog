<?php

namespace GeneaLabs\LaravelNovaBlog\Providers;

use GeneaLabs\LaravelNovaBlog\Nova\Post;
use GeneaLabs\LaravelNovaBlog\Post as PostModel;
use GeneaLabs\LaravelNovaBlog\Nova\Blog;
use GeneaLabs\LaravelNovaBlog\Blog as BlogModel;
use Laravel\Nova\Nova as LaravelNova;
use Laravel\Nova\NovaApplicationServiceProvider;

class Nova extends NovaApplicationServiceProvider
{
    protected function resources()
    {
        Blog::$model = BlogModel::model();
        Post::$model = PostModel::model();

        (new LaravelNova())->resources([
            Blog::class,
            Post::class,
        ]);
    }
}
