<?php

namespace Resources\Chat\Ports;

use ModelEnum;

class CompletionsResponse
{
    private string $id;
    private array $choices;
    private int $created;
    private string $model;
    private string $object;
    private array $usage;

    public function __construct(
        string $id,
        array $choices,
        int $created,
        string $model,
        string $object,
        array $usage
    ) {
        $this->id = $id;
        $this->choices = $choices;
        $this->created = $created;
        $this->model = $model;
        $this->object = $object;
        $this->usage = $usage;
    }
}