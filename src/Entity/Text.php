<?php

namespace Marlemiesz\GptSdk\Entity;

class Text implements EntityInterface
{
    public function __construct(
        readonly string   $text,
        readonly int      $index,
        readonly int|null $logprobs,
        readonly string   $finishReason
    )
    {
    }
    
    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    
    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }
    
    /**
     * @return int
     */
    public function getLogprobs(): int
    {
        return $this->logprobs;
    }
    
    /**
     * @return int
     */
    public function getFinishReason(): int
    {
        return $this->finishReason;
    }
    
    public static function fromPrimitive(array $data): EntityInterface
    {
        return new self(
            $data['text'],
            $data['index'],
            $data['logprobs'],
            $data['finish_reason']
        );
    }
    
    public function toPrimitive(): array
    {
        return [
            'text' => $this->text,
            'index' => $this->index,
            'logprobs' => $this->logprobs,
            'finish_reason' => $this->finishReason
        ];
    }
}
