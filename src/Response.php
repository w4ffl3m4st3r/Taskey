<?php

namespace Framework;

class Response
{
    public int $responseCode;

    public string $body;

    public ?string $headers;

    public function __construct(int $responseCode, string $body, ?string $headers = null)
    {
        $this->responseCode = $responseCode;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function echo(): void
    {
        http_response_code($this->responseCode);

        echo $this->body . ' ' . $this->headers;
    }
}
