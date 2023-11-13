<?php

namespace Marlemiesz\GptSdk;

use Marlemiesz\GptSdk\Enum\GptChatModelEnum;
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

    /**
     * @param GptModelEnum $model
     * @param string $prompt
     * @param string|null $suffix
     * @param int $maxTokens
     * @param float $temperature
     * @param int $topP
     * @param int $n
     * @param bool $stream
     * @param int|null $logprobs
     * @param bool $echo
     * @param string|array|null $stop
     * @param float $presencePenalty
     * @param float $frequencyPenalty
     * @param int $bestOf
     * @param int|null $logitBias
     * @return Texts
     *
     * Used for older models
     */
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


    /**
     * @param GptChatModelEnum $model
     * @param string $role
     * @param string $content
     * @param int $maxTokens
     * @param float $temperature
     * @param int $topP
     * @param int $n
     * @param bool $stream
     * @param string|array|null $stop
     * @param float $presencePenalty
     * @param float $frequencyPenalty
     * @param array|null $tools
     * @param string|object|null $tool_choice
     * @param string|null $user
     * @param object|null $response_format
     * @param string|null $seed
     * @return Texts
     */
    public function generateChatText(
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
    ): Texts
    {
        $request = new Request\TextChatGenerationFromScratch(
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
        return $this->client->call($request);

    }

}
