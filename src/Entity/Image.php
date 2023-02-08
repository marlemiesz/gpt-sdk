<?php

namespace Marlemiesz\GptSdk\Entity;

class Image implements EntityInterface
{
    private string $url;
    
    public function __construct(string $url)
    {
        $this->url = $url;
    }
    
    public function getUrl(): string
    {
        return $this->url;
    }
    
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    
    public static function fromPrimitive(array $data): EntityInterface
    {
        return new self($data['url']);
    }
    
    public function toPrimitive(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}
