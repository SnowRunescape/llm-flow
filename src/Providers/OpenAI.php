<?php

namespace SnowRunescape\LLMFlow\Providers;

use SnowRunescape\LLMFlow\AbstractLLM;
use SnowRunescape\LLMFlow\Config;

/*
 * OpenAI LLM Provider
 *
 * This class implements the Gemini LLM provider, extending the AbstractLLM class.
 * It provides the functionality to interact with the Gemini API for generating responses.
 */
class OpenAI extends AbstractLLM
{
    /**
     * The base URL for the LLM API.
     *
     * @var string
     */
    protected $apiBaseUrl = 'https://api.openai.com/v1/';

    /**
     * Ask the OpenAI model a question.
     *
     * @param array $messages The messages to send to the model.
     * @param mixed $config The configuration for the model.
     * @return string The response from the model.
     */
    public function ask(array $messages, Config $config): string
    {
        $model = $config->model ?? 'gpt-4o';

        $contents = [];
        foreach ($messages as $msg) {
            $role = $msg['role'] ?? 'user';
            $contents[] = [
                'role' => $role,
                'parts' => [ ['text' => $msg['content']] ]
            ];
        }

        $payload = [
            'contents' => $contents,
            'generationConfig' => [
                'temperature' => $config->temperature ?? 0.7,
                'topP' => $config->topP ?? 1.0,
                'maxOutputTokens' => $config->maxTokens ?? 1024,
            ]
        ];

        $data = $this->apiRequest($payload);

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
    }
}
