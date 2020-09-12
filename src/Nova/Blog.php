<?php

namespace GeneaLabs\LaravelNovaBlog\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest;
use GeneaLabs\LaravelNovaBlog\Blog as BlogModel;

class Blog extends NovaResource
{
    public static $model = BlogModel::class;
    public static $title = 'title';
    public static $search = [
        'title',
        'description',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),
            Text::make("Title")
                ->sortable()
                ->rules("required"),
            Text::make("URL Slug", "slug")
                ->hideFromIndex()
                ->hideWhenCreating(),
            Textarea::make("Description"),
            Number::make("Posts", "postsCount", function () {
                    return $this->posts->count();
                })
                ->onlyOnIndex()
                ->sortable(),
            HasMany::make("Posts", "posts", Post::class),
            DateTime::make("Created At")
                ->onlyOnDetail(),
            DateTime::make("Updated At")
                ->onlyOnDetail(),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withCount('posts as postsCount');
    }
}
