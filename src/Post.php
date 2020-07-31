<?php

namespace GeneaLabs\LaravelNovaBlog;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

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
