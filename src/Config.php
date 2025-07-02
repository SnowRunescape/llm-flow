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
    public function __construct(
        public string $model = 'gpt-4o',
        public float $temperature = 0.7,
        public float $topP = 1.0,
        public int $maxTokens = 1024,
        public ?string $systemPrompt = null,
        public array $stop = [],
        public array $tools = [],
        public array $extras = []
    ) {}
}
