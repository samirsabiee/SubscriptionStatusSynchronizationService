<?php

namespace App\Services\Markets;

use App\Enums\PlatformEnum;
use App\Services\Market;

class GooglePlay extends Market
{

    function config(): array
    {
        return config('googleplay');
    }

    function appsPlatform(): string
    {
        return PlatformEnum::ANDROID;
    }
}
