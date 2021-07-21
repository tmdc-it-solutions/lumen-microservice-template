<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

/**
 * Service discovery endpoints for identity and health checking.
 * @Resource("Service Discovery", uri="api/v1/discovery")
 */
class ServiceDiscoveryController extends Controller
{

    /**
     * Get the service name and version
     *
     * @Get("/")
     * @Versions({"v1"})
     * @Response(200, body={"name":"example-service","version":"Lumen (8.2.4) (Laravel Components ^8.0)"})
     */
    public function index()
    {
        return response()->json([
            'name' => config('app.name'),
            'version' => app()->version()
        ]);
    }
}
