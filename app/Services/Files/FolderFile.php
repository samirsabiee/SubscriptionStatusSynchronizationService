<?php

namespace App\Services\Files;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FolderFile
{
    public static function getClassNamespaces(string $app_path = null): Collection
    {
        if (!File::exists(app_path($app_path))) {
            throw new FileException('given app_path not exist');
        }

        $files = File::files(app_path('Services/Markets'));

        return collect($files)->map(function ($file) {
            $path = Str::afterLast($file->getPathname(), app_path());
            $path = Str::replace('/', '\\', $path);
            $path = Str::replace('.' . $file->getExtension(), '', $path);
            $path = Str::ucfirst($path);
            return "App${path}";

        });
    }
}
