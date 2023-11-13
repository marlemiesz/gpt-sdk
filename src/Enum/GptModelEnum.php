<?php

namespace Marlemiesz\GptSdk\Enum;

enum GptModelEnum
{
    case Davinci;

    case Curie;
    case Babbage;
    case Ada;

    public function getValue() : string
    {
        return match ($this) {
            self::Davinci => 'text-davinci-003', // deprecated on Jan 4th 2024.
            self::Curie => 'text-curie-001',
            self::Babbage => 'text-babbage-001',
            self::Ada => 'text-ada-001',
        };
    }
}
