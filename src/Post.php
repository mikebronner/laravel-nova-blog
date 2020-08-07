<?php

namespace GeneaLabs\LaravelNovaBlog;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
        "published_at",
    ];
    protected $fillable = [
        "excerpt",
        "featured_image_alt",
        "featured_image",
        "message",
        "title",
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : MorphToMany
    {
        return $this->morphToMany("\\GeneaLabs\\LaravelNovaCategories\\Category", "categorizable");
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
        return str_word_count($this->message);
    }
}
