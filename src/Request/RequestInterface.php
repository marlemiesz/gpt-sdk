<?php

namespace Marlemiesz\GptSdk\Request;

use Marlemiesz\GptSdk\Request\Payload\PayloadInterface;
use Marlemiesz\GptSdk\Response\ResponseInterface;

interface RequestInterface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getPayload(): PayloadInterface | null;
    public function prepareResponse(array $response): ResponseInterface;
}
