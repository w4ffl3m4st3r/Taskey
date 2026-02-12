<?php

namespace Framework;

class ResponseFactory
{
    public function body(string $body): Response
    {
        return new Response($body, 200);
    }

    public function notFound(): Response
    {
        return new Response("404 | Not Found", 404);
    }
}