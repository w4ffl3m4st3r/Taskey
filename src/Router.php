<?php

namespace Framework;

class Router
{
    /** @var Route[] */
    public array $routes = [];

    public function __construct()
    {
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request->method, $request->path)) {
                $matchedRoute = $route;
                break;
            }
        }

        if (!isset($matchedRoute)) {
            return new Response("No route matched", 404, null);
        }

        return call_user_func($matchedRoute->callback);
    }

    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }
}
