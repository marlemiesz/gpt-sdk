<?php

namespace Marlemiesz\GptSdk\Response;


use Marlemiesz\GptSdk\Entity\EntityInterface;

interface ResponseInterface
{
    public function addItem(EntityInterface $item): void;
    public function removeItem(int $index): void;
    public function getItem(int $index): EntityInterface;
    public function getItems(): array;
    
    public function countItems(): int;
    
    public function validate(): bool;
    
}
