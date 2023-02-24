<?php

namespace App\Services\Files;

use App\Services\Market;

class MarketFileManager
{
    public static function isMarketExist(string $name): bool
    {
        $namespaces = FolderFile::getClassNamespaces('Services/Markets');
        return !$namespaces->filter(fn($namespace) => resolve($namespace) instanceof Market && resolve($namespace)->name() == $name)->isEmpty();
    }

    public static function getMarketService(string $name): ?Market
    {
        $namespaces = FolderFile::getClassNamespaces('Services/Markets');
        return resolve($namespaces->filter(fn($namespace) => resolve($namespace) instanceof Market && resolve($namespace)->name() == $name)->first());
    }
}
