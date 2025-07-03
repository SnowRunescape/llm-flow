<?php

namespace SnowRunescape\LLMFlow\Tests\Providers;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Client\ClientInterface;

class OpenAITest extends TestCase
{
    public function testAskReturnsExpectedResponse()
    {
        $mockResponse = new Response(200, [], json_encode([
            'choices' => [['message' => ['content' => 'Mocked response']]],
        ]));

        $mockHttp = $this->createMock(ClientInterface::class);
        $mockHttp->method('request')->willReturn($mockResponse);

        $provider = new OpenAiProvider($mockHttp, 'fake-api-key');

        $config = new AIChatConfig();
        $result = $provider->ask('Say something', $config);

        $this->assertEquals('Mocked response', $result);
    }
}
