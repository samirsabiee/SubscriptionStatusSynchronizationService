<?php

namespace App\Services;

abstract class Market implements IMarket
{

    public function getStatus(string $appName)
    {
        // TODO: Implement getStatus() method.
    }

    abstract function appsPlatform(): string;

    abstract function config(): array;

}
