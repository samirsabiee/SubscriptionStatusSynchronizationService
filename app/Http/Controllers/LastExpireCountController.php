<?php

namespace App\Http\Controllers;

use App\Models\ExpiredSubscriptionsCount;
use Illuminate\Http\Request;

class LastExpireCountController extends Controller
{

    public function lastExpCount(Request $request)
    {
        return response()->json([
            'count' => ExpiredSubscriptionsCount::query()->orderByDesc('created_at')->first()->count
        ]);
    }
}
