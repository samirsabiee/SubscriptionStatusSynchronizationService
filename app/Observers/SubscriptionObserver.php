<?php

namespace App\Observers;

use App\Enums\AppSubscriptionStatusEnum;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\ExpiredSubscriptionStatusNotification;

class SubscriptionObserver
{
    /**
     * Handle the Subscription "created" event.
     */
    public function created(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "updated" event.
     */
    public function updated(Subscription $subscription): void
    {
        if ($subscription->isDirty('status') &&
            $subscription->getOriginal('status') == AppSubscriptionStatusEnum::ACTIVE &&
            $subscription->status == AppSubscriptionStatusEnum::EXPIRED
        ) {
            // If we had a role and permission (like bouncer package), this query would be better
            /** @var User $admin */
            $admin = User::query()->whereId(1)->first();
            $admin->notify((new ExpiredSubscriptionStatusNotification($subscription->app->name))->delay(now()->addMinute()));
        }
    }

    /**
     * Handle the Subscription "deleted" event.
     */
    public function deleted(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "restored" event.
     */
    public function restored(Subscription $subscription): void
    {
        //
    }

    /**
     * Handle the Subscription "force deleted" event.
     */
    public function forceDeleted(Subscription $subscription): void
    {
        //
    }
}
