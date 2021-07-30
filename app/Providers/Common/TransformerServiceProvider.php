<?php

namespace App\Providers\Common;

use Illuminate\Support\ServiceProvider;

class TransformerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
        $transformerBindings = app('microservice')->getTransformerBindings();

        foreach ($transformerBindings as $model => $transformer) {
            $this->bindTransformerToModel($model, $transformer);
        }
    }

    protected function bindTransformerToModel(string $model, string $transformer)
    {
        $transformerFactory = app('Dingo\Api\Transformer\Factory');
        $transformerFactory->register('App\\Models\\' . $model, 'App\\Transformers\\' . $transformer);
    }
}
