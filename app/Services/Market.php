<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class Market implements IMarket
{
    private $body = null;
    private $statusCode = null;

    public function fetchSubscriptionStatus(string $appName): self
    {
        if (is_null($this->body) || is_null($this->statusCode)) {
            $response = Http::post($this->config()['base_url'], ['app' => $appName]);
            $this->body = $response->json();
            $this->statusCode = $response->status();
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
