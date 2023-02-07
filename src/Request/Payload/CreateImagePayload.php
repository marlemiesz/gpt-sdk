<?php

namespace Marlemiesz\GptSdk\Request\Payload;

use Marlemiesz\GptSdk\Enum\ImageResponseFormatEnum;
use Marlemiesz\GptSdk\Enum\ImageSizeEnum;

class CreateImagePayload implements PayloadInterface
{
    private string $prompt;
    private int $numberImagesToGenerate;
    private string $size;
    private string $responseFormat;
    
    /**
     * @param string $prompt
     * @param int $numberImagesToGenerate
     * @param string $size
     * @param string $responseFormat
     */
    public function __construct(string $prompt, int $numberImagesToGenerate, ImageSizeEnum $size, ImageResponseFormatEnum $responseFormat)
    {

        $this->prompt = $prompt;
        $this->numberImagesToGenerate = $numberImagesToGenerate;
        $this->size = $size->getValue();
        $this->responseFormat = $responseFormat->getValue();
    }

    public function fromPrimitive(array $data): PayloadInterface
    {
        return new self($data['prompt'], $data['n'], $data['size'], $data['response_format']);
    }
    
    public function toPrimitive(): array
    {
        return [
            'prompt' => $this->prompt,
            'n' => $this->numberImagesToGenerate,
            'size' => $this->size,
            'response_format' => $this->responseFormat,
        ];
    }
}
