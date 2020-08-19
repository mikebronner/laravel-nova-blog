<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use GeneaLabs\LaravelNovaBlog\Blog;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class BlogsController extends Controller
{
    public function show(int $blogId) : View
    {
        $blogModel = Blog::model();
        $blog = (new $blogModel)
            ->with("posts")
            ->find($blogId);

        return view("laravel-nova-blog::blogs.show")
            ->with(compact("blog"));
    }
}
