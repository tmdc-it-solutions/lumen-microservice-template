<?php

namespace App\Providers\Common;

use Illuminate\Auth\EloquentUserProvider;

class EloquentUuidUserProvider extends EloquentUserProvider
{

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        $uuid = expand_uuid($identifier);
        $model = $this->createModel();

        return $this->newModelQuery($model)
            ->whereUuid($uuid)
            ->first();
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $uuid = expand_uuid($identifier);
        $model = $this->createModel();

        $retrievedModel = $this->newModelQuery($model)->whereUuid(
            $uuid
        )->first();

        if (!$retrievedModel) {
            return;
        }

        $rememberToken = $retrievedModel->getRememberToken();

        return $rememberToken && hash_equals($rememberToken, $token)
            ? $retrievedModel : null;
    }
}
