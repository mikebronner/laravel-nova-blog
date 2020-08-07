<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use GeneaLabs\LaravelNovaBlog\Post;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function index() : View
    {
        $postModel = app("blog")->postModel;
        $posts = (new $postModel)
            ->where("published_at", "<=", (new Carbon)->now())
            ->orderBy("published_at", "DESC")
            ->take(12)
            ->get();

        return view("laravel-nova-blog::posts.index")
            ->with(compact("posts"));
    }

    public function show(int $postId) : View
    {
        $postModel = app("blog")->postModel;
        $post = (new $postModel)->find($postId);

        return view("laravel-nova-blog::posts.show")
            ->with(compact("post"));
    }
}
