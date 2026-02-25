<?php

namespace Framework;

use Exception;

class Router
{

    /** @var Route[] */
    public array $routes = [];

    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @throws Exception
     */
    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request->method, $request->path)) {
                $request->routeParameters = $route->routeParameters;
                return ($route->callback)($request);
            }
        }

        return $this->responseFactory->notFound();
    }

    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }
}
