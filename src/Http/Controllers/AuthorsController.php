<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class AuthorsController extends Controller
{
    public function show(Authenticatable $author) : View
    {
        return view("authors.show")
            ->with(compact("author"));
    }
}
