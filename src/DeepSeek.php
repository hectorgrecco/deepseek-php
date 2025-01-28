<?php

use GuzzleHttp\Client;

final class DeepSeek
{
    private readonly Client $http;

    public function __construct(string $apiKey)
    {
        $this->http = new Client([
            'base_uri' => 'https://api.deepseek.com/',
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);
    }

    public function client(): DeepSeekClient {
        return new DeepSeekClient($this->http);
    }
}