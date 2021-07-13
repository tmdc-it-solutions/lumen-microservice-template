<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ServiceDiscoveryController extends Controller
{
    public function index()
    {
        return response()->json([
            'name' => config('app.name'),
            'version' => app()->version()
        ]);
    }

    public function name()
    {
        return response()->json([
            'name' => config('app.name')
        ]);
    }

    public function version()
    {
        return response()->json([
            'version' => app()->version()
        ]);
    }
}
