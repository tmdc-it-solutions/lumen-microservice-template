<?php

namespace App\Http\Controllers;

use App\Actions\TestAction;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function check() {
        dispatch(TestAction::makeJob('haha'));

        return 'sabong-user-service';
    }

    public function queue_test() {

    }
}
