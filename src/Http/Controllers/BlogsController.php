<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use GeneaLabs\LaravelNovaBlog\Blog;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class BlogsController extends Controller
{
    public function show(string $slug) : View
    {
        $blogModel = Blog::model();
        $blog = (new $blogModel)
            ->with("posts")
            ->where("slug", $slug)
            ->first();

        return view("laravel-nova-blog::blogs.show")
            ->with(compact("blog"));
    }
}
