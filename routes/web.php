<?php

use GeneaLabs\LaravelNovaBlog\Http\Controllers\AuthorsController;
use GeneaLabs\LaravelNovaBlog\Http\Controllers\BlogsController;
use GeneaLabs\LaravelNovaBlog\Http\Controllers\PostsController;

Route::resource("authors", AuthorsController::class);
Route::resource("blogs", BlogsController::class);
Route::resource("posts", PostsController::class);
