<?php

namespace App\Observers;

use App\Exceptions\NotFoundMarketFileService;
use App\Models\Market;
use App\Services\Files\MarketFileManager;

class MarketObserver
{


    /**
     * @throws NotFoundMarketFileService
     */
    public function creating(Market $market): void
    {
        if(!MarketFileManager::isMarketExist($market->name)){
            throw new NotFoundMarketFileService("{$market->name} dose not exist");
        }
    }
    /**
     * Handle the Market "created" event.
     */
    public function created(Market $market): void
    {
        //
    }

    /**
     * Handle the Market "updated" event.
     */
    public function updated(Market $market): void
    {
        //
    }

    /**
     * Handle the Market "deleted" event.
     */
    public function deleted(Market $market): void
    {
        //
    }

    /**
     * Handle the Market "restored" event.
     */
    public function restored(Market $market): void
    {
        //
    }

    /**
     * Handle the Market "force deleted" event.
     */
    public function forceDeleted(Market $market): void
    {
        //
    }
}
