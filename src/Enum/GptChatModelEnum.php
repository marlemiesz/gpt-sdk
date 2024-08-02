<?php

namespace Marlemiesz\GptSdk\Enum;

enum GptChatModelEnum
{

    case GPT35Turbo;
    case GPT4;
    case GPT4o;
    case GPT4oMINI;
    case GPT4Turbo;

    public function getValue() : string
    {
        return match ($this) {
            self::GPT35Turbo => 'gpt-3.5-turbo',
            self::GPT4 => 'gpt-4',
            self::GPT4o => 'gpt-4o',
            self::GPT4oMINI => 'gpt-4o-mini',
            self::GPT4Turbo => 'gpt-4-turbo',

        };
    }
}
