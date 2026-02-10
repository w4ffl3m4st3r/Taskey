<?php

namespace Framework;

use App\ServiceProvider;
use Exception;

class Kernel
{
    private Router $router;

    private ServiceContainer $container;

    public function __construct()
    {
        $this->router = new Router();
        $this->container = new ServiceContainer();
    }

    public function registerRoutes(RouteProviderInterface $provider): void
    {
        $provider->register($this->router, $this->container);
    }

    public function registerServices(ServiceProviderInterface $serviceProvider): void
    {
        $serviceProvider->register($this->container);
    }

    public function handle(Request $request): Response
    {
        return $this->router->dispatch($request);
    }
}