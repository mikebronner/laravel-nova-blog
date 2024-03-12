<?php

namespace GeneaLabs\LaravelNovaBlog\Nova;

use GeneaLabs\LaravelNovaBlog\Post as PostModel;
use GeneaLabs\LaravelNovaMorphManyToOne\Nova\MorphManyToOne;
use GeneaLabs\NovaFileUploadField\FileUpload;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Resource as NovaResource;

class Post extends NovaResource
{
    public static $model = PostModel::class;
    public static $title = 'title';
    public static $search = [
        'title',
        'body',
    ];

    public static function label()
    {
        return "Blog Posts";
    }

    public function fields(Request $request)
    {
        $fields = [
            ID::make()
                ->sortable(),
            FileUpload::make("Featured Image")
                ->thumbnail(function ($image) {
                    return $image
                        ? asset($image)
                        : '';
                })
                ->disk("tenant")
                ->path("media/announcement-images")
                ->prunable(),
            Text::make("Title")
                ->help("Please use the official name of the repository or
                    archive. If it is your private collection, we recommend
                    using your own name.")
                ->sortable()
                ->rules("required"),
            Textarea::make("Excerpt")
                ->rules("required")
                ->hideFromIndex(),
            Trix::make("Message")
                ->help("Here you can provide a little insight into the archive,
                    describe its goals, its history, etc. Viewers will see this
                    as the introduction on the public Archive page.")
                ->rules("required")
                ->hideFromIndex(),
        ];

        if (class_exists("\\GeneaLabs\\LaravelNovaCategories\\Nova\\Category")) {
            $fields = array_merge($fields, [
                MorphManyToOne::make(
                    "Category",
                    "category",
                    "\\GeneaLabs\\LaravelNovaCategories\\Nova\\Category"
                ),
            ]);
        }

        $fields = array_merge($fields, [
            BelongsTo::make("Author", "author", User::class)
                ->withMeta([
                    "belongsToId" => $this->resource->governor_owned_by
                        ?: auth()->user()->id,
                ])
                ->searchable()
                ->hideFromIndex(),
            DateTime::make("Published At"),
            DateTime::make("Created At")
                ->onlyOnDetail(),
            DateTime::make("Updated At")
                ->onlyOnDetail(),
            BelongsTo::make(
                "Blog",
                "blog",
                Blog::class
            ),
        ]);

        return $fields;
    }
}
