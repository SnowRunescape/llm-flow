<?php

namespace SnowRunescape\LLMFlow;

use SnowRunescape\LLMFlow\Config;

/**
 * LLMInterface
 *
 * This interface defines the contract for Language Model (LLM) providers.
 * It requires the implementation of the ask method, which sends messages to the LLM and returns a response.
 */
interface LLMInterface
{
    /**
     * Ask the LLM a question or provide a prompt.
     *
     * @param array $messages An array of messages to send to the LLM.
     * @param Config $config Configuration settings for the LLM.
     * @return string The response from the LLM.
     */
    public function ask(array $messages, Config $config): string;
}
