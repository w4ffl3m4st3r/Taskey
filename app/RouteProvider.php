<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\Router;
use Framework\RouteProviderInterface;
use Framework\ServiceContainer;
use Exception;

class RouteProvider implements RouteProviderInterface
{
    /**
     * @throws Exception
     */
    public function register(Router $router, ServiceContainer $container): void
    {
        $homeController = $container->get(HomeController::class);
        $router->addRoute('GET', '/', [$homeController, "index"]);
        $router->addRoute('GET', '/about', [$homeController, "about"]);

        $taskController = $container->get(TaskController::class);
        $router->addRoute('GET', '/tasks', [$taskController, "index"]);
        $router->addRoute('GET', '/tasks/(?<id>\d+)', [$taskController, "show"]);
        $router->addRoute('GET', '/tasks/create', [$taskController, "create"]);
        $router->addRoute('POST', '/tasks', [$taskController, 'store']);
        $router->addRoute('GET', '/tasks/(?<id>\d+)/edit', [$taskController, 'edit']);
        $router->addRoute('POST', '/tasks/(?<id>\d+)/edit', [$taskController, 'update']);
        $router->addRoute('GET', '/tasks/(?<id>\d+)/delete', [$taskController, 'deleteConfirm']);
        $router->addRoute('POST', '/tasks/(?<id>\d+)/delete', [$taskController, 'delete']);
    }
}
