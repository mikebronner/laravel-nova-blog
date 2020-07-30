<?php

namespace GeneaLabs\LaravelNovaBlog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use ReflectionClass;

class SearchableBaseModel extends Model
{
    use Searchable;
    use SoftDeletes;

    public $asYouType = true;

    public function toSearchableArray()
    {
        $class = new ReflectionClass($this);
        $data = $this->toArray();
        $methods = $class->getMethods();
        $returnTypes = [
            '\BelongsTo',
            '\BelongsToMany',
            '\HasMany',
            '\HasManyThrough',
            '\HasOne',
        ];

        foreach ($methods as $method) {
            foreach ($returnTypes as $returnType) {
                if (!$method->getReturnType()) {
                    continue;
                }

                $methodReturnType = $method
                    ->getReturnType()
                    ->getName();

                if (Str::endsWith($methodReturnType, $returnType)) {
                    unset($data[Str::snake($method->name)]);
                    break;
                }
            }
        }

        return $data;
    }
}
