<?php

namespace App\Providers\Common;

use Illuminate\Support\ServiceProvider;
use Keiko\Uuid\Shortener\Dictionary;
use Keiko\Uuid\Shortener\Shortener;

class UuidShortenerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $shortener = Shortener::make(
            Dictionary::createUnmistakable()
        );

        $this->app->instance('uuid.shortener', $shortener);
    }
}
