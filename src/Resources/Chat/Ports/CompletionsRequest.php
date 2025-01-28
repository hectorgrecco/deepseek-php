<?php

namespace Resources\Chat\Ports;

use ModelEnum;

class CompletionsRequest
{
    protected array $messages;
    protected ModelEnum $model;
    protected float $frequencyPenalty;
    protected int $maxTokens;
    protected float $presencePenalty;
    protected array $responseFormat;
    protected ?array $stop;
    protected bool $stream;
    protected ?array $streamOptions;
    protected float $temperature;
    protected float $topP;
    protected ?array $tools;
    protected ?string $toolChoice;
    protected bool $logprobs;

    public function __construct(
        array $messages,
        ModelEnum $model,
        float $frequencyPenalty,
        int $maxTokens,
        float $presencePenalty,
        array $responseFormat,
        ?array $stop,
        ?array $streamOptions,
        float $temperature,
        float $topP,
        ?array $tools,
        ?string $toolChoice,
        bool $logprobs
    ) {
        $this->messages = $messages;
        $this->model = $model;
        $this->frequencyPenalty = $frequencyPenalty;
        $this->maxTokens = $maxTokens;
        $this->presencePenalty = $presencePenalty;
        $this->responseFormat = $responseFormat;
        $this->stop = $stop;
        $this->stream = false;
        $this->streamOptions = $streamOptions;
        $this->temperature = $temperature;
        $this->topP = $topP;
        $this->tools = $tools;
        $this->toolChoice = $toolChoice;
        $this->logprobs = $logprobs;
    }

    public function toJson()
    {
        return json_encode([
            'messages' => $this->messages,
            'model' => $this->model->value,
            'frequency_penalty' => $this->frequencyPenalty,
            'max_tokens' => $this->maxTokens,
            'presence_penalty' => $this->presencePenalty,
            'response_format' => $this->responseFormat,
            'stop' => $this->stop,
            'stream' => $this->stream,
            'stream_options' => $this->streamOptions,
            'temperature' => $this->temperature,
            'top_p' => $this->topP,
            'tools' => $this->tools,
            'tool_choice' => $this->toolChoice,
            'logprobs' => $this->logprobs,
        ]);
    }
}