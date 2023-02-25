<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface IMarket
{

    public function fetchSubscriptionStatus(string $appName): self;


    public function isSuccessful(): bool;

    public function getBody(): Collection;
}
