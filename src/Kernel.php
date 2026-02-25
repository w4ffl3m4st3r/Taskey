<?php

namespace Framework;

use Exception;

class Kernel
{
    private Router $router;

    private ServiceContainer $container;

    private ConfigManager $configManager;

    /**
     * @throws Exception
     */
    public function __construct(mixed $config)
    {
        $this->configManager = new ConfigManager($config);

        $this->container = new ServiceContainer();
        $this->container->set(ResponseFactory::class, new ResponseFactory(
            $this->configManager->get('DEBUG'),
            $this->configManager->get('VIEW_PATH')
        ));

        $responseFactory = $this->container->get(ResponseFactory::class);
        $this->router = new Router($responseFactory);
    }

    public function registerRoutes(RouteProviderInterface $provider): void
    {
        $provider->register($this->router, $this->container);
    }

    public function registerServices(ServiceProviderInterface $serviceProvider): void
    {
        $serviceProvider->register($this->container);
    }

    /**
     * @throws Exception
     */
    public function handle(Request $request): Response
    {
        try {
            return $this->router->dispatch($request);
        } catch (Exception $e) {
            throw new Exception('Cannot handle request', 0, $e);
        }
    }
}