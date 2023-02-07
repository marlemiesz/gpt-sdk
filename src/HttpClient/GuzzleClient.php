<?php

namespace Marlemiesz\GptSdk\HttpClient;

use GuzzleHttp\Client;
use Marlemiesz\GptSdk\Request\RequestInterface;

class GuzzleClient extends HttpClient
{
    const HTTP_SUCCESS = [200, 201, 202, 203, 204, 205, 206, 207, 208, 226];
    private Client $httpConnection;
    
    public function __construct(readonly string $apiKey)
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
    
    public function call(RequestInterface $request)
    {
        $response = $this->httpConnection->request($request->getMethod(), $request->getUri(), [
            'json' => $request->getPayload()?->toPrimitive()
        ]);
        $this->validResponse($response);
        return $request->prepareResponse(json_decode($response->getBody()->getContents(), true));
    }
    
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return void
     * @throws \Exception
     */
    protected function validResponse(\Psr\Http\Message\ResponseInterface $response): void
    {
        if (in_array($response->getStatusCode(), self::HTTP_SUCCESS) === false) {
            throw new \Exception($response->getBody()->getContents(), $response->getStatusCode());
        }
    }
}
