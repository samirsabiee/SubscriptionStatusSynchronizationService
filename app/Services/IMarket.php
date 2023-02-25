<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Collection;

interface IMarket
{

    public function fetchSubscriptionStatus(Subscription $subscription): self;


    public function isSuccessful(): bool;

    public function getBody(): Collection;
}
