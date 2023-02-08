<?php

namespace Marlemiesz\GptSdk\Request;

use Marlemiesz\GptSdk\Entity\Text;
use Marlemiesz\GptSdk\Enum\GptModelEnum;
use Marlemiesz\GptSdk\Request\Payload\CreateTextPayload;
use Marlemiesz\GptSdk\Request\Payload\PayloadInterface;
use Marlemiesz\GptSdk\Response\ResponseInterface;
use Marlemiesz\GptSdk\Response\Texts;

class TextGenerationFromScratch implements RequestInterface
{
    const METHOD = 'POST';
    const URI = '/v1/completions';
    private CreateTextPayload $payload;
    
    public function __construct(
        GptModelEnum      $model,
        string            $prompt,
        string|null       $suffix = null,
        int               $maxTokens = 16,
        float             $temperature = 1,
        int               $topP = 1,
        int               $n = 1,
        bool              $stream = false,
        int|null          $logprobs = null,
        bool              $echo = false,
        string|array|null $stop = null,
        float             $presencePenalty = 0,
        float             $frequencyPenalty = 0,
        int               $bestOf = 1,
        int|null          $logitBias = null
    )
    {
        $this->payload = new CreateTextPayload(
            model: $model,
            prompt: $prompt,
            suffix: $suffix,
            maxTokens: $maxTokens,
            temperature: $temperature,
            topP: $topP,
            n: $n,
            stream: $stream,
            logprobs: $logprobs,
            echo: $echo,
            stop: $stop,
            presencePenalty: $presencePenalty,
            frequencyPenalty: $frequencyPenalty,
            bestOf: $bestOf,
            logitBias: $logitBias
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
            $texts[] = new Text($item['text'], $item['index'], $item['logprobs'], $item['finish_reason']);
        }
        return new Texts($texts, $response['created'], $response['model'], $response['id']);
    }
}
