<?php

namespace App\Transformers;

use App\Models\ExampleModel;
use League\Fractal\TransformerAbstract;

class ExampleTransformer extends TransformerAbstract
{
    public function transform(ExampleModel $model)
    {
        return [
            'uuid' => reduce_uuid($model->uuid)
        ];
    }
}
