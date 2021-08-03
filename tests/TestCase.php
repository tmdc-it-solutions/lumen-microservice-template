<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    /** @var array $headers */
    public $headers;

    public function __construct()
    {
        parent::__construct();
        $this->headers = [];
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    /**
     * Attach Accept header to headers.
     */
    public function withAcceptHeader()
    {
        $subtype = env('API_SUBTYPE', 'appname');
        $this->headers['Accept'] = "application/vnd.$subtype.v1+json";
        return $this;
    }

    /**
     * Attach Authorization Bearer header to headers.
     */
    public function withAuthHeader($user)
    {
        $token = JWTAuth::fromUser($user);
        $this->headers['Authorization'] = "Bearer {$token}";
        return $this;
    }
}
