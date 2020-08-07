<?php

namespace GeneaLabs\LaravelNovaBlog\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class AuthorsController extends Controller
{
    public function show(User $author) : View
    {
        return view("authors.show")
            ->with(compact("author"));
    }
}
