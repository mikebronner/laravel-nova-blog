<?php

namespace GeneaLabs\LaravelNovaBlog\View\Components;

use Illuminate\View\Component;

class Posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravel-nova-blog::components.posts');
    }
}
