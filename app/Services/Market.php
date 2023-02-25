<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class Market implements IMarket
{
    private $body = null;
    private $statusCode = null;

    private ?Subscription $subscription = null;

    public function fetchSubscriptionStatus(Subscription $subscription): self
    {
        if (is_null($this->body) || is_null($this->statusCode)) {
            $response = Http::post($this->config()['base_url'], ['app' => $subscription->app->name]);
            $this->body = $response->json();
            $this->statusCode = $response->status();
            $this->subscription = $subscription;
        }
        return $this;
    }

    public function isSuccessful(): bool
    {
        return $this->statusCode == 200;
    }

    public function getBody(): Collection
    {
        return collect($this->body);
    }

    public function name(): string
    {
        return class_basename(resolve(get_called_class()));
    }

    abstract function updateStatus(Subscription $subscription);

    abstract function config(): array;

}
