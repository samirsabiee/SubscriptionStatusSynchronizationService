<?php

namespace App\Services\Markets;

use App\Enums\PlatformEnumType;
use App\Services\Market;

class AppStore extends Market
{
    function config(): array
    {
        return config('appstore');
    }

    function appsPlatform(): string
    {
        return PlatformEnumType::IOS;
    }
}
