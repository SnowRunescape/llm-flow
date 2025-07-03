<?php

namespace SnowRunescape\LLMFlow\Tests\Providers;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Client\ClientInterface;

class GeminiTest extends TestCase
{
    public function testAskReturnsExpectedResponse()
    {
        $mockResponse = new Response(200, [], json_encode([
            'choices' => [['message' => ['content' => 'Mocked response']]],
        ]));

        $mockHttp = $this->createMock(ClientInterface::class);
        $mockHttp->method('request')->willReturn($mockResponse);

        $llm = new Gemini('fake-api-key', $mockHttp);
        $result = $llm->ask('Say something');

        $this->assertEquals('Mocked response', $result);
    }
}
