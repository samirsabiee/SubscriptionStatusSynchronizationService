<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends BaseModel
{

    public function market(): BelongsTo
    {
        return $this->belongsTo(Market::class);
    }

    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }
}
