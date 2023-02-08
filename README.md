# Installation

Require this package in your `composer.json` and update composer.

```php
"marlemiesz/gpt-sdk": "^0.1"
```
OR
```php
composer require marlemiesz/gpt-sdk: 0.1
```

# Docs
## Authentication
To use the SDK, you need to create an instance of the `OpenAi` class and pass it your api key.

```php
use Marlemiesz\GptSdk\OpenAi;
$openai = new OpenAi('api-key');
```
## Completion
Api Reference: https://platform.openai.com/docs/api-reference/completions/create
### Create completion
```php
$response = $openai->generateText(
            model: GptModelEnum::Davinci,
            prompt: 'Prompt text',
            maxTokens: 16,
            temperature: 1,
        );
```
## Image
Api Reference: https://platform.openai.com/docs/api-reference/images/create
### Create image
```php
$response = $openai->generateImage(
            'Prompt text', 
            1, 
            ImageSizeEnum::large
        );
``` 
