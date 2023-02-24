<?php

namespace App\Services;

abstract class Market implements IMarket
{

    public function getStatus(string $appName)
    {
        // TODO: Implement getStatus() method.
    }

    public function name(): string
    {
        return class_basename(resolve(get_called_class()));
    }

    abstract function appsPlatform(): string;

    abstract function config(): array;

}
