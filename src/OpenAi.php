<?php

namespace Marlemiesz\GptSdk;

use Marlemiesz\GptSdk\Enum\GptModelEnum;
use Marlemiesz\GptSdk\Enum\ImageResponseFormatEnum;
use Marlemiesz\GptSdk\Enum\ImageSizeEnum;
use Marlemiesz\GptSdk\HttpClient\GuzzleClient;
use Marlemiesz\GptSdk\HttpClient\HttpClientInterface;
use Marlemiesz\GptSdk\Response\Images;
use Marlemiesz\GptSdk\Response\Texts;

readonly class OpenAi
{
    
    
    private HttpClientInterface $client;
    
    public function __construct(string $apiKey)
    {
        $this->client = new GuzzleClient($apiKey);
    }
    
    /**
     * @param string $prompt
     * @param int $numberImagesToGenerate
     * @param string $size
     * @param string $responseFormat
     * @return Images
     */
    public function generateImage(
        string                  $prompt,
        int                     $numberImagesToGenerate,
        ImageSizeEnum           $size,
        ImageResponseFormatEnum $responseFormat = ImageResponseFormatEnum::url
    ): Images
    {
        $request = new Request\ImageGenerationFromScratch($prompt, $numberImagesToGenerate, $size, $responseFormat);
        return $this->client->call($request);
    }
    
    public function generateText(
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
    ): Texts
    {
        $request = new Request\TextGenerationFromScratch(
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
        return $this->client->call($request);
    }
    
    
}
