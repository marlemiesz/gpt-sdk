<?php

namespace Marlemiesz\GptSdk\Enum;

enum ImageResponseFormatEnum
{
    case url;
    case base64;
    
    public function getValue() : string
    {
        return match ($this) {
            self::url => 'url',
            self::base64 => 'b64_json',
        };
    }
}
