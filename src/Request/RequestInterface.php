<?php

namespace Marlemiesz\GptSdk\Request;

use Marlemiesz\GptSdk\Request\Payload\PayloadInterface;

interface RequestInterface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getHeaders(): array;
    public function getPayload(): PayloadInterface | null;
}
