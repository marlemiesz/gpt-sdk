<?php

namespace Marlemiesz\GptSdk\Enum;

enum ImageSizeEnum
{
    case small;
    case medium;
    case large;
    
    public function getValue() : string
    {
        return match ($this) {
            self::small => '256x256',
            self::medium => '512x512',
            self::large => '1024x1024',
        };
    }
}
