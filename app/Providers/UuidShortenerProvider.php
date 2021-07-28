<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Keiko\Uuid\Shortener\Dictionary;
use Keiko\Uuid\Shortener\Shortener;

class UuidShortenerProvider extends ServiceProvider
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
