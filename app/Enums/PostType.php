<?php

namespace App\Enums;

class PostType
{
    const POST = 'post';
    const PAGE = 'page';
    const TEAM = 'team';
    const PHOTO_FEATURE = 'photo_feature';

    public static function toArray()
    {
        return [
            self::POST,
            self::PAGE,
            self::TEAM,
            self::PHOTO_FEATURE,
        ];
    }
}
