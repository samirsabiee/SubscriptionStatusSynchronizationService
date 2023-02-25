<?php

namespace App\Http\Controllers;

use App\Enums\AppSubscriptionStatusEnum;
use Illuminate\Http\Request;

class MarketServiceController extends Controller
{
    private array $statusCodes = [200, 400, 401, 403, 500];
    private string $subscriptionStatus;
    private int $statusCode;

    public function __construct()
    {
        $this->statusCode = $this->statusCodes[array_rand($this->statusCodes)];
        $this->subscriptionStatus = AppSubscriptionStatusEnum::getValues()[array_rand(AppSubscriptionStatusEnum::getValues())];
    }

    public function googlePlay(Request $request)
    {

        return response()->json([
            'status' => $this->subscriptionStatus
        ], $this->statusCode);
    }

    public function appStore(Request $request)
    {
        return response()->json([
            'subscription' => $this->subscriptionStatus
        ], $this->statusCode);
    }
}
