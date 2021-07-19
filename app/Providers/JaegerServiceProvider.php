<?php

namespace App\Providers;

use App\Events\Http\RequestHandled;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Jaeger\Config;
use OpenTracing\GlobalTracer;
use Ramsey\Uuid\Uuid;

class JaegerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerGlobalTracer();
        $this->registerListeners();
    }

    protected function registerConfig(): void
    {
        $this->app->instance('jaeger.uuid', Uuid::uuid1());

        $config = new Config(
            require_once __DIR__ . '/../config/jaeger-client.php',
            config('app.name')
        );

        $config->initializeTracer();
    }

    protected function registerGlobalTracer(): void
    {
        $tracer = GlobalTracer::get();
        $this->app->instance('jaeger.tracer', $tracer);

        $globalSpan = $tracer->startSpan('app');
        $globalSpan->setTag('type', $this->getServiceType());
        $globalSpan->setTag('uuid', app('jaeger.uuid'));
    }

    protected function registerListeners(): void
    {
        // When the app terminates we must finish the global span
        // and send the trace to the jaeger agent.
        app()->terminating(function () {
            app('jaeger.tracer.globalSpan')->finish();
            app('jaeger.tracer')->flush();
        });

        // Listen for each logged message and attach it to the global span
        Event::listen(MessageLogged::class, function (MessageLogged $e) {
            app('jaeger.tracer.globalSpan')->log((array) $e);
        });

        // Listen for the request handled event and set more tags for the trace
        Event::listen(RequestHandled::class, function (RequestHandled $e) {
            app('jaeger.tracer.globalSpan')->setTags([
                'user_id' => auth()->user()->id ?? "-",
                'company_id' => auth()->user()->company_id ?? "-",

                'request_host' => $e->request->getHost(),
                'request_path' => $path = $e->request->path(),
                'request_method' => $e->request->method(),

                'api' => str_contains($path, 'api'),
                'response_status' => $e->response->getStatusCode(),
                'error' => !$e->response->isSuccessful(),
            ]);
        });

        // Also listen for queries and log then,
        // it also receives the log in the MessageLogged event above
        DB::listen(function ($query) {
            Log::debug("[DB Query] {$query->connection->getName()}", [
                'query' => str_replace('"', "'", $query->sql),
                'time' => $query->time . 'ms',
            ]);
        });
    }

    protected function getServiceType(): string
    {
        return $this->app->runningInConsole() ? 'console' : 'http';
    }
}
