<?php

namespace GeneaLabs\LaravelNovaBlog\View\Components;

use GeneaLabs\LaravelNovaBlog\Post as PostModel;
use Illuminate\View\Component;

class Post extends Component
{
    public $post;

    public function __construct(PostModel $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('laravel-nova-blog::components.post');
    }
}
