<?php

namespace GeneaLabs\LaravelNovaBlog;

use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model implements OverridableModel
{
    use Overridable;
    
    protected $fillable = [
        "title",
        "description",
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
