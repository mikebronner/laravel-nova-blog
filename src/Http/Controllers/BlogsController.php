<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use GeneaLabs\LaravelNovaBlog\Blog;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class BlogsController extends Controller
{
    public function show(Blog $blog) : View
    {
        return view("blogs.show")
            ->with(compact("blog"));
    }
}
