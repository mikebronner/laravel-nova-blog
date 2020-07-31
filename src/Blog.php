<?php

namespace GeneaLabs\LaravelNovaBlog;

use Jenssegers\Model\Model;

class Blog extends Model
{
    protected $ignoreMigrations = false;
    protected $postModel;

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
        return $this->postModel;
    }

    public function getIgnoreMigrationsAttribute(): string
    {
        return $this->ignoreMigrations;
    }
}
