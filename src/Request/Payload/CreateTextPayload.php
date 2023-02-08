<?php

namespace Marlemiesz\GptSdk\Request\Payload;

use Marlemiesz\GptSdk\Enum\GptModelEnum;

class CreateTextPayload implements PayloadInterface
{
    public function __construct(
        readonly GptModelEnum      $model,
        readonly string            $prompt,
        readonly string|null       $suffix = null,
        readonly int               $maxTokens = 16,
        readonly float             $temperature = 1,
        readonly int               $topP = 1,
        readonly int               $n = 1,
        readonly bool              $stream = false,
        readonly int|null          $logprobs = null,
        readonly bool              $echo = false,
        readonly string|array|null $stop = null,
        readonly float             $presencePenalty = 0,
        readonly float             $frequencyPenalty = 0,
        readonly int               $bestOf = 1,
        readonly int|null          $logitBias = null
    )
    {
    }
    
    public function fromPrimitive(array $data): PayloadInterface
    {
        new self(
            $data['model'],
            $data['prompt'],
            $data['suffix'],
            $data['max_tokens'],
            $data['temperature'],
            $data['top_p'],
            $data['n'],
            $data['stream'],
            $data['logprobs'],
            $data['echo'],
            $data['stop'],
            $data['presence_penalty'],
            $data['frequency_penalty'],
            $data['best_of'],
            $data['logit_bias']
        );
    }
    
    public function toPrimitive(): array
    {
        return [
            'model' => $this->model,
            'prompt' => $this->prompt,
            'suffix' => $this->suffix,
            'max_tokens' => $this->maxTokens,
            'temperature' => $this->temperature,
            'top_p' => $this->topP,
            'n' => $this->n,
            'stream' => $this->stream,
            'logprobs' => $this->logprobs,
            'echo' => $this->echo,
            'stop' => $this->stop,
            'presence_penalty' => $this->presencePenalty,
            'frequency_penalty' => $this->frequencyPenalty,
            'best_of' => $this->bestOf,
            'logit_bias' => $this->logitBias,
        ];
    }
}
