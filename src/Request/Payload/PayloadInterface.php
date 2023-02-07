<?php

namespace Marlemiesz\GptSdk\Request\Payload;

interface PayloadInterface
{
    public function fromPrimitive(array $data): PayloadInterface;
    public function toPrimitive(): array;
}
