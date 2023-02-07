<?php
namespace Marlemiesz\GptSdk;
use Marlemiesz\GptSdk\HttpClient\GuzzleClient;
use Marlemiesz\GptSdk\HttpClient\HttpClientInterface;
use Marlemiesz\GptSdk\Response\Images;

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
    public function generateImage(string $prompt, int $numberImagesToGenerate, string $size, string $responseFormat = 'url'): Images
    {
        $request = new Request\ImageGenerationFromScratch($prompt, $numberImagesToGenerate, $size, $responseFormat);
        return $this->client->call($request);
    }
    
    
    
    
}
