<?php

namespace App\Services\Markets;

use App\Models\Subscription;
use App\Services\Market;

class AppStore extends Market
{
    function config(): array
    {
        return config('appstore');
    }

    function updateStatus(Subscription $subscription)
    {
        if (!$this->fetchSubscriptionStatus('hello')->isSuccessful()) {
            //TODO
        }else {
            $subscription->update(['status' => $this->getBody()->get('subscription')]);
        }
    }
}
