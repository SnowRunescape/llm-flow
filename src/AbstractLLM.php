<?php

namespace SnowRunescape\LLMFlow;

/**
 * Abstract class for Language Model (LLM) providers.
 *
 * This class provides a base implementation for LLM providers, including
 * methods to get and set the API key.
 */
abstract class AbstractLLM implements LLMInterface
{
    /**
     * The API key for the LLM.
     *
     * @var string
     */
    private string $apiKey;

    /**
     * AbstractLLM constructor.
     *
     * @param string $apiKey The API key for the LLM.
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get the API key for the LLM.
     *
     * @return string The API key.
     */
    protected function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Set the API key for the LLM.
     *
     * @param string $apiKey The API key to set.
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }
}
