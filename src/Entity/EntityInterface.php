<?php

namespace Marlemiesz\GptSdk\Entity;

interface EntityInterface
{
    public function fromPrimitive(array $data): EntityInterface;
    public function toPrimitive(): array;
}
