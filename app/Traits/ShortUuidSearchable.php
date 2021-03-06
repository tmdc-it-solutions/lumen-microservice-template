<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Searchable by short UUID trait.
 *
 * Include this trait in any Eloquent model where you wish to make it
 * searchable by a url-safe short UUID.
 *
 * This trait expects that the model uses the trait
 * `Dyrynda\Database\Support\GeneratesUuid`.
 *
 * A `uuid.shortener` singleton injected with `Keiko\Uuid\Shortener\Shortener`
 * is expected to be present as well.
 */
trait ShortUuidSearchable
{

    public function getShortUuid()
    {
        return reduce_uuid($this->uuid);
    }

    public static function findByShortUuid($shortUuid)
    {
        $uuid = expand_uuid($shortUuid);
        $result = static::whereUuid($uuid)->first();

        if (!$result) {
            throw new NotFoundHttpException(static::getModelName() . ' not found');
        }

        return $result;
    }

    private static function getModelName()
    {
        $path = explode('\\', static::class);
        return array_pop($path);
    }
}
