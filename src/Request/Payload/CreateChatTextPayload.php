<?php

namespace Marlemiesz\GptSdk\Request\Payload;

use Marlemiesz\GptSdk\Enum\GptChatModelEnum;
use Marlemiesz\GptSdk\Utils;

class CreateChatTextPayload implements PayloadInterface
{
    public function __construct(
        readonly GptChatModelEnum   $model,
        readonly string             $role,
        readonly string             $content,
        readonly int                $maxTokens = 16,
        readonly float              $temperature = 1,
        readonly int                $topP = 1,
        readonly int                $n = 1,
        readonly bool               $stream = false,
        readonly string|array|null  $stop = null,
        readonly float              $presencePenalty = 0,
        readonly float              $frequencyPenalty = 0,
        readonly array|null         $tools = null,
        readonly string|object|null $tool_choice = null,
        readonly string|null        $user = null,
        readonly object|null        $response_format = null,
        readonly string|null        $seed = null

    )
    {
    }

    public function fromPrimitive(array $data): PayloadInterface
    {
        new self(
            $data['model'],
            $data['messages']['role'],
            $data['messages']['content'],
            $data['max_tokens'],
            $data['temperature'],
            $data['top_p'],
            $data['n'],
            $data['stream'],
            $data['stop'],
            $data['presence_penalty'],
            $data['frequency_penalty'],
            $data['tools'],
            $data['tool_choice'],
            $data['user'],
            $data['response_format'],
            $data['seed']
        );

    }

    public function toPrimitive() : array
    {

        return Utils::removeNullValueFromArray([
            'model' => $this->model->getValue(),
            'messages' => [
                [
                    'role' => $this->role,
                    'content' => $this->content
                ]
            ],
            'max_tokens' => $this->maxTokens,
            'temperature' => $this->temperature,
            'top_p' => $this->topP,
            'n' => $this->n,
            'stream' => $this->stream,
            'stop' => $this->stop,
            'presence_penalty' => $this->presencePenalty,
            'frequency_penalty' => $this->frequencyPenalty,
            'tools' => $this->tools,
            'tool_choice' => $this->tool_choice,
            'user' => $this->user,
            'response_format' => $this->response_format,
            'seed' => $this->seed
        ]);
    }
}
