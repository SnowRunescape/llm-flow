<?php

namespace SnowRunescape\LLMFlow;

use GuzzleHttp\ClientInterface;

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
     * The base URL for the LLM API.
     *
     * @var string
     */
    protected $apiBaseUrl = '';

    /**
     * The HTTP client for making requests.
     *
     * @var ClientInterface
     */
    private ClientInterface $client;

    /**
     * AbstractLLM constructor.
     *
     * @param string $apiKey The API key for the LLM.
     * @param ClientInterface $client The Guzzle client for making requests.
     */
    public function __construct(string $apiKey, ClientInterface $client = null)
    {
        $this->apiKey = $apiKey;
        $this->client = $client ?: new Client([
            'base_uri' => $this->apiBaseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getApiKey(),
                'Content-Type'  => 'application/json',
            ],
        ]);
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

    /**
     * Realiza uma requisição POST usando Guzzle e retorna o array de resposta.
     *
     * @param array $payload
     * @return array
     */
    protected function apiRequest(array $payload): array
    {
        $response = $this->client->post($this->apiBaseUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getApiKey(),
                'Content-Type'  => 'application/json',
            ],
            'json' => $payload,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
