<?php

use GuzzleHttp\Client;
use Resources\Chat\Chat;
use Resources\Chat\Ports\CompletionsRequest;

class DeepSeekClient
{
    private readonly Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function chat(CompletionsRequest $params) {
        return new Chat($this->client);
    }
}