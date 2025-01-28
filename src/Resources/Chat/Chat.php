<?php

namespace Resources\Chat;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Chat
{
    private readonly Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function completions(CompletionsRequest $params)
    {
        try {
            $response = $this->client->request('POST', '/chat/completions', $params);

        } catch (RequestException $e) {
            $response = $e->getResponse();

        }
    }
}