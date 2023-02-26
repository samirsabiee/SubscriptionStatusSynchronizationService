<?php

namespace App\Observers;

use App\Enums\AppSubscriptionStatusEnum;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\ExpiredSubscriptionStatusNotification;
use Illuminate\Support\Facades\Cache;

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
            $admin->notify((new ExpiredSubscriptionStatusNotification($subscription->app->name)));
        }

        if($subscription->isDirty('status') && $subscription->status == AppSubscriptionStatusEnum::EXPIRED){
            $exp_count = Cache::tags('expiration_count')->get('exp_count');
            if(is_null($exp_count)){
                Cache::tags('expiration_count')->set('exp_count', 1);
            }else{
                Cache::tags('expiration_count')->increment('exp_count');
            }
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
