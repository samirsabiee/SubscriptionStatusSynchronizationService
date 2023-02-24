<?php

namespace App\Models;

use App\Services\Files\FolderFile;
use App\Services\Market;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class App extends BaseModel
{
    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
    public function getMarketsAttribute(): Collection
    {
        $markets = FolderFile::getClassNamespaces('Services/Markets');
        return $markets->filter(fn($market) => $instance = resolve($market) instanceof Market && $instance->appsPlatform() === $this->platform->name);
    }
}
