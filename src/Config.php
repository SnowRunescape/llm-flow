<?php

namespace SnowRunescape\LLMFlow;

/**
 * Config
 *
 * This class represents the configuration settings for a Language Model (LLM).
 * It includes properties such as model type, temperature, max tokens, system prompt, stop sequences, tools, and extras.
 */
class Config
{
    public string $model;
    public float $temperature;
    public float $topP;
    public int $maxTokens;
    public ?string $systemPrompt;
    public array $stop;
    public array $tools;
    public array $extras;

    public function __construct(
        string $model = 'gpt-4o',
        float $temperature = 0.7,
        float $topP = 1.0,
        int $maxTokens = 1024,
        ?string $systemPrompt = null,
        array $stop = [],
        array $tools = [],
        array $extras = []
    ) {
        $this->model = $model;
        $this->temperature = $temperature;
        $this->topP = $topP;
        $this->maxTokens = $maxTokens;
        $this->systemPrompt = $systemPrompt;
        $this->stop = $stop;
        $this->tools = $tools;
        $this->extras = $extras;
    }
}
