<?php

namespace App\Helpers;

use App\Models\Media;
use Illuminate\Support\Facades\Cache;

class MediaHelper
{
    public static function getModel()
    {
        return new Media;
    }

    public static function getKBorMB($size)
    {
        $fileSize = $size;
        $formattedSize = null;

        if ($size < 1048576) {
            $formattedSize = number_format($fileSize / 1024, 1).' KB';
        } else {
            $formattedSize = number_format($fileSize / 1048576, 1).' MB';
        }

        return $formattedSize;
    }

    public static function getImageById($id)
    {
        $cacheKey = 'media_image_'.$id;

        return Cache::remember($cacheKey, 3600, function () use ($id) {
            return Media::with('user:id,name')->where('id', $id)->first();
        });
    }
}
