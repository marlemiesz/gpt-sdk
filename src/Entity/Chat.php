<?php

namespace Marlemiesz\GptSdk\Entity;

class Chat implements EntityInterface
{
    public function __construct(
        readonly string   $role,
        readonly string   $content,
        readonly int      $index,
        readonly string   $finishReason
    )
    {
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
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
    public function getFinishReason(): int
    {
        return $this->finishReason;
    }

    public static function fromPrimitive(array $data): EntityInterface
    {
        return new self(
            $data['role'],
            $data['content'],
            $data['index'],
            $data['finish_reason']
        );
    }

    public function toPrimitive(): array
    {
        return [
            'role' => $this->role,
            'content' => $this->content,
            'index' => $this->index,
            'finish_reason' => $this->finishReason
        ];
    }
}
