<?php

namespace GeneaLabs\LaravelNovaBlog;

use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model implements OverridableModel
{
    use Overridable;
    use Sluggable;

    protected $fillable = [
        "description",
        "slug",
        "title",
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
