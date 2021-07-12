<?php

namespace App\Projectors;

use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\Models\Account;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AccountBalanceProjector extends Projector
{
    public function onAccountCreated(AccountCreated $event)
    {
        Account::create($event->accountAttributes);
    }

    public function onMoneyAdded(MoneyAdded $event)
    {
        $account = Account::getByUuid($event->accountUuid);
        $account->balance += $event->amount;
        $account->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $account = Account::getByUuid($event->accountUuid);
        $account->balance -= $event->amount;
        $account->save();
    }

    public function onAccountDeleted(AccountDeleted $event)
    {
        Account::getByUuid($event->accountUuid)->delete();
    }
}
