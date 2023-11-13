<?php

namespace Marlemiesz\GptSdk\Request;

use Marlemiesz\GptSdk\Entity\Chat;
use Marlemiesz\GptSdk\Enum\GptChatModelEnum;
use Marlemiesz\GptSdk\Request\Payload\CreateChatTextPayload;
use Marlemiesz\GptSdk\Request\Payload\PayloadInterface;
use Marlemiesz\GptSdk\Response\ResponseInterface;
use Marlemiesz\GptSdk\Response\Texts;

class TextChatGenerationFromScratch implements RequestInterface
{

    const METHOD = 'POST';
    const URI = '/v1/chat/completions';
    private CreateChatTextPayload $payload;

    public function __construct(
        GptChatModelEnum   $model,
        string             $role,
        string             $content,
        int                $maxTokens = 16,
        float              $temperature = 1,
        int                $topP = 1,
        int                $n = 1,
        bool               $stream = false,
        string|array|null  $stop = null,
        float              $presencePenalty = 0,
        float              $frequencyPenalty = 0,
        array|null         $tools = null,
        string|object|null $tool_choice = null,
        string|null        $user = null,
        object|null        $response_format = null,
        string|null        $seed = null

    )
    {
        $this->payload = new CreateChatTextPayload(
            model: $model,
            role: $role,
            content: $content,
            maxTokens: $maxTokens,
            temperature: $temperature,
            topP: $topP,
            n: $n,
            stream: $stream,
            stop: $stop,
            presencePenalty: $presencePenalty,
            frequencyPenalty: $frequencyPenalty,
            tools: $tools,
            tool_choice: $tool_choice,
            user: $user,
            response_format: $response_format,
            seed: $seed
        );

    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getUri(): string
    {
        return self::URI;
    }

    public function getPayload(): PayloadInterface|null
    {
        return $this->payload;
    }

    public function prepareResponse(array $response): ResponseInterface
    {
        $texts = [];
        foreach ($response['choices'] as $item) {
            $texts[] = new Chat($item['message']['role'], $item['message']['content'], $item['index'], $item['finish_reason']);
        }
        return new Texts($texts, $response['created'], $response['model'], $response['id']);
    }
}
