<?php

namespace App\Http\Controllers;

use App\Models\Account;

class AccountController extends Controller
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

    public function create()
    {
        Account::createWithAttributes(['name' => 'Luke']);

        return 'sabong-user-service';
    }

    public function addMoney()
    {
        $account = Account::where(['name' => 'Luke'])->first();
        $account->addMoney(500);

        return 'Added 500 money to Luke';
    }
}
