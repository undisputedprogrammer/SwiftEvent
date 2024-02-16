<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\File;
use App\Http\Helpers\Core\FileManager;
use Illuminate\Support\Facades\Storage;
use App\Http\Constants\FileDestinations;

class PageHelper
{
    public static function getEventImageUrl($fileName, $eventId)
    {
        $file = asset('assets/images/placeholder.jpg');
        $path = str_replace(':id', $eventId, FileDestinations::EVENT_IMAGES);

        if (null != $fileName) {
            if (File::exists(self::getStoragePath($path.$fileName))) {
                $file = self::getPublicPath($path.$fileName);
            }
        }
        return $file;
    }

    public static function getStoragePath($path)
    {
         return storage_path().'/app/public/'.$path;
    }

    public static function getPublicPath($path)
    {
        return 'storage/'.$path;
    }
}
