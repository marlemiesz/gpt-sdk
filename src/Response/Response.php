<?php

namespace Marlemiesz\GptSdk\Response;


use Marlemiesz\GptSdk\Entity\EntityInterface;

abstract class Response implements ResponseInterface
{
    
    protected array $items = [];
    
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->validate();
    }
    public function addItem(EntityInterface $item): void
    {
        $this->items[] = $item;
    }
    
    public function getFirstItem(): EntityInterface
    {
        return $this->items[0];
    }
    
    public function removeItem(int $index): void
    {
        unset($this->items[$index]);
    }
    
    public function getItem(int $index): EntityInterface
    {
        return $this->items[$index];
    }
    
    public function getItems(): array
    {
        return $this->items;
    }
    
    public function countItems(): int
    {
        return count($this->items);
    }
}
