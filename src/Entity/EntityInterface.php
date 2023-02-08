<?php

namespace Marlemiesz\GptSdk\Entity;

interface EntityInterface
{
    public static function fromPrimitive(array $data): EntityInterface;
    
    public function toPrimitive(): array;
}
