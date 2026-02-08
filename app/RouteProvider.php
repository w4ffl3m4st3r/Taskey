<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\RouteProviderInterface;
use Framework\Router;

class RouteProvider implements RouteProviderInterface
{
    public function register(Router $router): void
    {
        $homeController = new HomeController();
        $taskController = new TaskController();
        $router->addRoute('GET', '/', [$homeController, 'index']);
        $router->addRoute('GET', '/about', [$homeController, 'about']);
        $router->addRoute('GET', '/tasks', [$taskController, 'index']);
        $router->addRoute('GET', '/tasks/create', [$taskController, 'create']);
    }
}