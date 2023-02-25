<?php

namespace App\Models;

use App\Services\Files\MarketFileManager;

class Market extends BaseModel
{
    public function getServiceAttribute(): ?\App\Services\Market
    {
        return MarketFileManager::getMarketService($this->name);
    }
}
