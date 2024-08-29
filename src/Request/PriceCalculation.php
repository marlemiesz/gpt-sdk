<?php

namespace Marlemiesz\GptSdk\Request;




use Marlemiesz\GptSdk\Enum\GptModelPriceEnum;

class PriceCalculation
{

    // price per 1K input/output tokens (currency = $)
    // https://openai.com/api/pricing/
    // waiting for the official pricing endpoint
    public function getPrice(string $model): ?array
    {
        if (strpos($model, 'gpt-3.5-turbo') === 0) {
            return ['input' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT35TurboINPUT), 'output' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT35TurboOUTPUT), 'per' => GptModelPriceEnum::getValue(GptModelPriceEnum::PERTOKENS)];
        } elseif (strpos($model, 'gpt-4') === 0) {
            return ['input' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4INPUT), 'output' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4OUTPUT), 'per' => GptModelPriceEnum::getValue(GptModelPriceEnum::PERTOKENS)];
        } elseif (strpos($model, 'gpt-4o') === 0) {
            return ['input' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4oINPUT), 'output' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4oOUTPUT), 'per' => GptModelPriceEnum::getValue(GptModelPriceEnum::PERTOKENS)];
        } elseif (strpos($model, 'gpt-4o-mini') === 0) {
            return ['input' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4oMINIINPUT), 'output' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4oMINIOUTPUT), 'per' => GptModelPriceEnum::getValue(GptModelPriceEnum::PERTOKENS)];
        } elseif (strpos($model, 'gpt-4-turbo') === 0) {
            return ['input' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4TurboINPUT), 'output' => GptModelPriceEnum::getValue(GptModelPriceEnum::GPT4TurboOUTPUT), 'per' => GptModelPriceEnum::getValue(GptModelPriceEnum::PERTOKENS)];
        }
        return null;
    }

    public function calculatePrice(string $model, array $usage): ?array
    {
        $prices = $this->getPrice($model);

        if(!$prices) {
            return null;
        }

        $usage['prompt_tokens_price'] = doubleval($usage['total_tokens']) * ($prices['input']/$prices['per']);
        $usage['completion_tokens_price'] = doubleval($usage['total_tokens']) * ($prices['output']/$prices['per']);
        $usage['total_tokens_price'] = doubleval($usage['prompt_tokens_price']) + doubleval($usage['completion_tokens_price']);

        return $usage;
    }
}
