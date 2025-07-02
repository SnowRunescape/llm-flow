<?php

namespace SnowRunescape\LLMFlow;

/**
 * LLMFactory
 *
 * This class is responsible for creating instances of LLM providers based on the given name.
 * It uses the factory design pattern to instantiate the appropriate LLM provider class.
 */
class LLMFactory
{
    /**
     * Create an instance of the LLM provider based on the given name.
     *
     * @param string $name The name of the LLM provider.
     * @param string $apiKey The API key for the LLM provider.
     * @return LLMInterface An instance of the LLM provider.
     */
    public static function create(string $name, string $apiKey): LLMInterface
    {
        $className = "SnowRunescape\\LLMFlow\\Providers\\" . ucfirst($name);
        if (!class_exists($className)) {
            throw new \InvalidArgumentException("LLM provider '{$name}' does not exist.");
        }

        return new $className($apiKey);
    }
}
