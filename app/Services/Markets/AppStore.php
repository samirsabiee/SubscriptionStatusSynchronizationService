<?php

namespace App\Services\Markets;

use App\Models\Subscription;
use App\Services\Market;
use Illuminate\Queue\CallQueuedClosure;

class AppStore extends Market
{
    function config(): array
    {
        return config('appstore');
    }

    function updateStatus(Subscription $subscription)
    {
        if (!$this->fetchSubscriptionStatus($subscription->app->name)->isSuccessful()) {
            dispatch(CallQueuedClosure::create(function () use ($subscription) {
                $subscription->market->service->updateStatus($subscription);
            }))->delay(now()->addHours(2));
        } else {
            $subscription->update(['status' => $this->getBody()->get('subscription')]);
        }
    }
}
