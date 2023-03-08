<?php

namespace Marlemiesz\GptSdk;

use Marlemiesz\GptSdk\Enum\GptModelEnum;
use Marlemiesz\GptSdk\Enum\ImageResponseFormatEnum;
use Marlemiesz\GptSdk\Enum\ImageSizeEnum;
use PHPUnit\Framework\TestCase;

class OpenAiTest extends TestCase
{
    const envFile = __DIR__ . '/../.env.test';
    
    const promptText = 'Please assign to google category product in json [{"Nazwa":"Buty Damskie Dynafit Alpine Dna","Producent":"Dynafit"}]';
    
    const promptImage = 'Happy employees of Sempai have free pizza today.';
    private OpenAi $openAi;
    
    private function validateEnv(): void
    {
        if(!file_exists(self::envFile)) {
            $this->markTestSkipped('No .env file found');
        }
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env.test');
        $dotenv->load();
        if(!isset($_ENV['GPT_TOKEN']) && $_ENV['GPT_TOKEN'] !== '') {
            $this->markTestSkipped('Please set GPT_TOKEN in your .env file');
        }
    }
    
    public function setUp(): void
    {
        parent::setUp();
        $this->validateEnv();
        $this->openAi = new OpenAi($_ENV['GPT_TOKEN']);
    }
    public function testGenerateImage()
    {
//        $response = $this->openAi->generateImage(self::promptImage, 1, ImageSizeEnum::large);
//        $this->assertIsArray($response->getItems());
//        $this->assertIsString($response->getFirstItem()->getUrl());
//        var_dump($response->getFirstItem()->getUrl());die();
//        $this->assertIsInt($response->getCreatedDate()->getTimestamp());
    }
    
    public function testGenerateText()
    {
        $response = $this->openAi->generateText(
            model: GptModelEnum::Davinci,
            prompt: self::promptText,
            maxTokens: 2000,
            temperature: 1,
        );
        var_dump($response->getFirstItem()->getText());die();
        $this->assertIsArray($response->getItems());
        $this->assertIsString($response->getFirstItem()->getText());
        
    }
}
