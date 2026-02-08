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
        $this->headers = $headers;
        $this->responseCode = $responseCode;
    }

    public function echo(): void
    {
        http_response_code($this->responseCode);

        echo $this->body . ' ' . $this->headers;
    }
}
