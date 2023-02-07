<?php

namespace Marlemiesz\GptSdk\Request;

use Marlemiesz\GptSdk\Entity\Image;
use Marlemiesz\GptSdk\Enum\ImageResponseFormatEnum;
use Marlemiesz\GptSdk\Enum\ImageSizeEnum;
use Marlemiesz\GptSdk\Request\Payload\CreateImagePayload;
use Marlemiesz\GptSdk\Request\Payload\PayloadInterface;
use Marlemiesz\GptSdk\Response\Images;
use Marlemiesz\GptSdk\Response\ResponseInterface;

class ImageGenerationFromScratch implements RequestInterface
{
    const METHOD = 'POST';
    const URI = '/v1/images/generations';
    private CreateImagePayload $payload;
    
    public function __construct(
        string $prompt,
        int $numberImagesToGenerate,
        ImageSizeEnum $size,
        ImageResponseFormatEnum $responseFormat = ImageResponseFormatEnum::url,
    ) {
        $this->payload = new CreateImagePayload($prompt, $numberImagesToGenerate, $size, $responseFormat);
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
        $images = [];
        foreach ($response['data'] as $item) {
            $images[] = new Image($item['url']);
        }
        return new Images($images, $response['created']);
    }
}
