<?php

namespace Marlemiesz\GptSdk\Request\Payload;

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
    public function __construct(string $prompt, int $numberImagesToGenerate, string $size, string $responseFormat = 'url')
    {

        $this->prompt = $prompt;
        $this->numberImagesToGenerate = $numberImagesToGenerate;
        $this->size = $size;
        $this->responseFormat = $responseFormat;
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
