<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ExampleModel extends Model
{
    protected $guarded = [];

    public static function createWithAttributes(array $attributes): ExampleModel
    {
        /*
         * Let's generate a uuid.
         */
        $attributes['uuid'] = (string) Uuid::uuid4();

        /*
         * The model will be created inside this event using the generated uuid.
         */
        publish_event(new ExampleModel($attributes));

        /*
         * The uuid will be used the retrieve the created account.
         */
        return static::getByUuid($attributes['uuid']);
    }

    /*
     * A helper method to quickly retrieve an account by uuid.
     */
    public static function getByUuid(string $uuid): ?ExampleModel
    {
        return static::where('uuid', $uuid)->first();
    }
}
