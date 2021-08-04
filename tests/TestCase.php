<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Traits\Common\ForeignKeys;
use Tests\Traits\Common\DatabaseSeeding;

abstract class TestCase extends BaseTestCase
{
    /** @var array $headers */
    public $headers;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
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
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        parent::setUpTraits();

        $uses = array_flip(class_uses_recursive(get_class($this)));

        if (isset($uses[ForeignKeys::class])) {
            /** @var \Tests\Traits\ForeignKeys $this */
            $this->enableForeignKeys();
        }

        if (isset($uses[DatabaseSeeding::class])) {
            /** @var \Tests\Traits\DatabaseSeeding $this */
            $this->seedDatabase();
        }
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
