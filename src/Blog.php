<?php

namespace GeneaLabs\LaravelNovaBlog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    protected $fillable = [
        "title",
        "description",
    ];
    protected $ignoreMigrations = false;
    protected $postModel;

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function ignoreMigrations(): void
    {
        $this->ignoreMigrations = true;
    }

    public function setPostModelAttribute(string $postModel): void
    {
        $this->postModel = $postModel;
    }

    public function getPostModelAttribute(): string
    {
        return $this->postModel
            ?? Post::class;
    }

    public function getIgnoreMigrationsAttribute(): string
    {
        return $this->ignoreMigrations;
    }
}
