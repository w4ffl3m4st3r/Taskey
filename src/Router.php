<?php

namespace Framework;

class Router
{
    private ResponseFactory $responseFactory;

    /** @var Route[] */
    public array $routes = [];

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->path === $request->path) {
                $matchedRoute = $route;
            }
        }

        if (!isset($matchedRoute)) {
            return $this->responseFactory->notFound();
        }

        return call_user_func($matchedRoute->callback);
    }

    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }
}