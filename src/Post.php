<?php

namespace GeneaLabs\LaravelNovaBlog;

use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelNovaMorphManyToOne\MorphManyToOne;
use GeneaLabs\LaravelNovaMorphManyToOne\Traits\HasMorphManyToOne;
use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements OverridableModel
{
    use HasMorphManyToOne;
    use Overridable;
    use SoftDeletes;
    use Sluggable;

    protected $dates = [
        "published_at",
    ];
    protected $fillable = [
        "excerpt",
        "featured_image_alt",
        "featured_image",
        "message",
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

    public function author() : BelongsTo
    {
        return $this->belongsTo(config("auth.providers.users.model"));
    }

    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function category() : MorphManyToOne
    {
        return $this->morphManyToOne("\\GeneaLabs\\LaravelNovaCategories\\Category", "categorizable");
    }

    public function getAuthorNameAttribute() : string
    {
        return $this->author->name
            ?? "";
    }

    public function getAuthorGravatarAttribute() : string
    {
        $hash = md5(strtolower(trim($this->author->email)));

        return "https://www.gravatar.com/avatar/{$hash}";
    }

    public function getCategoryNameAttribute() : string
    {
        return $this->category->name
            ?? "";
    }

    public function getReadDurationMinutesAttribute() : string
    {
        return (string) ceil(str_word_count($this->message) / 160);
    }
}
