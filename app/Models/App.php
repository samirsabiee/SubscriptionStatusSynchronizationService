<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class App extends BaseModel
{
    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
