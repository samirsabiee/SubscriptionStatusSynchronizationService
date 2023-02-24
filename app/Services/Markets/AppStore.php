<?php

namespace App\Services\Markets;

use App\Enums\PlatformEnum;
use App\Services\Market;

class AppStore extends Market
{
    function config(): array
    {
        return config('appstore');
    }

    function appsPlatform(): string
    {
        return PlatformEnum::IOS;
    }
}
