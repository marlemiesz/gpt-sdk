<?php

namespace Marlemiesz\GptSdk\HttpClient;

use GuzzleHttp\Client;

class GuzzleClient extends HttpClient
{
    public function __construct(string $apiKey)
    {
        $this->httpConnection = new Client([
            'base_uri' => self::API_URL,
            'headers'  => [
                'Content-Type' => 'application/json',
                'Authorization'     => $this->getAuthorization(),
            ]
        ]);
    }
    
    public function getAuthorization(): string
    {
        return 'Bearer ' . $this->apiKey;
    }
}
