<?php

namespace SnowRunescape\LLMFlow\Providers;

use SnowRunescape\LLMFlow\AbstractLLM;

/*
 * OpenAI LLM Provider
 *
 * This class implements the Gemini LLM provider, extending the AbstractLLM class.
 * It provides the functionality to interact with the Gemini API for generating responses.
 */
class OpenAI extends AbstractLLM
{
    public function ask(array $messages, $config): string
    {
        // TODO: Implement the OpenAI API call logic here.
    }
}
