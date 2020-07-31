<?php

namespace GeneaLabs\LaravelNovaBlog\Nova;

use GeneaLabs\LaravelNovaBlog\Post as PostModel;
use GeneaLabs\NovaFileUploadField\FileUpload;
use GeneaLabs\NovaGutenberg\Gutenberg;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource as NovaResource;

class Post extends NovaResource
{
    public static $model;
    public static $title = 'title';
    public static $search = [
        'title',
        'body',
    ];

    public function fields(Request $request)
    {
        return [
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
                ->rules("required"),
            Gutenberg::make("Message")
                ->help("Here you can provide a little insight into the archive,
                    describe its goals, its history, etc. Viewers will see this
                    as the introduction on the public Archive page.")
                ->rules("required"),
            BelongsTo::make("Author", "author", User::class)
                ->withMeta([
                    "belongsToId" => $this->resource->governor_owned_by
                        ?: auth()->user()->id,
                ])
                ->searchable(),
            // $this->ownerRelationshipField(),
            // $this->ownerIndexField(),
            DateTime::make("Published At"),
            DateTime::make("Created At")
                ->onlyOnDetail(),
            DateTime::make("Updated At")
                ->onlyOnDetail(),
        ];
    }

    public static function label()
    {
        return "Blog Posts";
    }
}
