<?php

namespace Marlemiesz\GptSdk\Enum;

enum GptChatModelEnum
{

    case GPT35Turbo;
    case GPT4;

    public function getValue() : string
    {
        return match ($this) {
            self::GPT35Turbo => 'gpt-3.5-turbo',
            self::GPT4 => 'gpt-4',

        };
    }
}
