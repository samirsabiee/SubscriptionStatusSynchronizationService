<?php

namespace App\Services\Markets;

use App\Models\Subscription;
use App\Services\Market;
use Illuminate\Queue\CallQueuedClosure;

class GooglePlay extends Market
{

    function config(): array
    {
        return config('googleplay');
    }

    function updateStatus(Subscription $subscription)
    {
        if (!$this->fetchSubscriptionStatus($subscription)->isSuccessful()) {
            dispatch(CallQueuedClosure::create(function () use ($subscription) {
                $subscription->market->service->updateStatus($subscription);
            }))->delay(now()->addHour());
        } else {
            $subscription->update(['status' => $this->getBody()->get('status')]);
        }
    }
}
