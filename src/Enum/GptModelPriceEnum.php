<?php

namespace Marlemiesz\GptSdk\Enum;

enum GptModelPriceEnum
{

    case GPT35TurboINPUT;
    case GPT35TurboOUTPUT;
    case GPT4INPUT;
    case GPT4OUTPUT;
    case GPT4oINPUT;
    case GPT4oOUTPUT;
    case GPT4oMINIINPUT;
    case GPT4oMINIOUTPUT;
    case GPT4TurboINPUT;
    case GPT4TurboOUTPUT;
    case PERTOKENS;

    public static function getValue(self $enum): float
    {
        return match ($enum) {
            self::GPT35TurboINPUT => 0.0005,
            self::GPT35TurboOUTPUT => 0.0015,
            self::GPT4INPUT => 0.0300,
            self::GPT4OUTPUT => 0.0600,
            self::GPT4oINPUT => 0.00500,
            self::GPT4oOUTPUT => 0.01500,
            self::GPT4oMINIINPUT => 0.000150,
            self::GPT4oMINIOUTPUT => 0.000600,
            self::GPT4TurboINPUT => 0.0100,
            self::GPT4TurboOUTPUT => 0.0300,
            self::PERTOKENS => 1000.00,

        };
    }
}
