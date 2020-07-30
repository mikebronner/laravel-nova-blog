<?php

namespace GeneaLabs\LaravelNovaBlog;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends SearchableBaseModel
{
    protected $dates = [
        "published_at",
    ];
    protected $fillable = [
        "message",
        "title",
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
