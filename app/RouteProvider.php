<?php

namespace App;

use Framework\Request;
use Framework\RouteProviderInterface;
use Framework\Router;
use App\Controllers\HomeController;
use App\Controllers\TaskController;
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
        $taskController = $container->get(TaskController::class);

        $router->addRoute('GET', '/', function () use ($homeController) {
            return $homeController->index();
        });
        $router->addRoute('GET', '/about', function () use ($homeController) {
            return $homeController->about();
        });

        $router->addRoute('GET', '/tasks', function () use ($taskController) {
            return $taskController->index();
        });

        $router->addRoute('GET', '/tasks/(?P<id>[0-9]+)/?', function (Request $request) use ($taskController) {
            return $taskController->show($request);
        });

        $router->addRoute('GET', '/tasks/create', function () use ($taskController) {
            return $taskController->create();
        });
    }
}
