<?php

namespace App;

use Framework\RouteProviderInterface;
use Framework\Router;
use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\ServiceContainer;
use Exception;

class RouteProvider implements RouteProviderInterface
{
    public function register(Router $router, ServiceContainer $container): void
    {
        $homeController = $container->get(HomeController::class);
        $taskController = $container->get(TaskController::class);

        $router->addRoute('GET', '/', [$homeController, 'index']);
        $router->addRoute('GET', '/about', [$homeController, 'about']);
        $router->addRoute('GET', '/tasks', [$taskController, 'index']);
        $router->addRoute('GET', '/tasks/create', [$taskController, 'create']);
    }
}