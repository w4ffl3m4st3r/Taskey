<?php

namespace Framework;

class Response
{
    public int $responseCode;

    public string $body;

    public ?string $headers;

    public function __construct(string $body, int $responseCode, ?string $headers = null)
    {
        $this->body = $body;
        $this->responseCode = $responseCode;
        $this->headers = $headers;
    }

    public function echo(): void
    {
        echo $this->body;
    }
}