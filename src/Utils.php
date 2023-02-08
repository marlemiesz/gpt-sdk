<?php

namespace Marlemiesz\GptSdk;

class Utils
{
    public static function removeNullValueFromArray(array $data): array
    {
        return array_filter($data, fn($value) => $value !== null);
    }
}
