<?php

namespace Slamtony\Openai;

use Illuminate\Support\Facades\Http;

class ChatGPT
{
    public static function generateText($prompt)
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
                "prompt" => $prompt,
                "max_tokens" => 1000,
                "temperature" => 0.5
            ]);

        return $response->json()['choices'][0]['text'];
    }
}