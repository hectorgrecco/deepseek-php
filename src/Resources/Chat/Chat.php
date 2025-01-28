<?php

namespace Resources\Chat;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Resources\Chat\Ports\CompletionsRequest;
use Resources\Chat\Ports\CompletionsResponse;

class Chat
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function completions(CompletionsRequest $params): CompletionsResponse
    {
        try {
            $res = $this->client->request('POST', '/chat/completions', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => $params->toJson()
            ]);

            $body = $res->getBody()->getContents();
            $data = json_decode($body, true);

            if (!is_array($data)) {
                throw new \Exception("Invalid API response: expected JSON object.");
            }

            return new CompletionsResponse(
                $data['id'] ?? null,
                $data['object'] ?? null,
                $data['created'] ?? null,
                $data['model'] ?? null,
                $data['choices'] ?? [],
                $data['usage'] ?? null
            );
        } catch (RequestException $e) {
            throw new \Exception("API request failed: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
}
