<?php

namespace App\Jobs;

use App\Models\ExpiredSubscriptionsCount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class RecordExpirationCountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $exp_count = Cache::tags('expiration_count')->get('exp_count', 0);
        ExpiredSubscriptionsCount::query()->create([
            'count' => $exp_count
        ]);
        Cache::tags('expiration_count')->forget('exp_count');
    }
}
