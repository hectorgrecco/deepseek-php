<?php

use GuzzleHttp\Client;

final class DeepSeek
{
    private readonly Client $http;

    public function __construct(string $apiKey)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.deepseek.com/',
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);
    }


}