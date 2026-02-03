<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
    }

    public function handle(Request $request): Response
    {
        return new Response(body: "body" . $request->path, responseCode: 200);
    }
}
