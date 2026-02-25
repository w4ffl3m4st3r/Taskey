<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use Exception;
use Framework\ResponseFactory;
use Framework\ServiceContainer;
use Framework\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /** @throws Exception */
    public function register(ServiceContainer $container): void
    {
        $taskRepository = new TaskRepository();

        $responseFactory = $container->get(ResponseFactory::class);

        $homeController = new HomeController($responseFactory);
        $taskController = new TaskController($responseFactory, $taskRepository);

        $container->set(TaskRepositoryInterface::class, $taskRepository);
        $container->set(HomeController::class, $homeController);
        $container->set(TaskController::class, $taskController);
    }
}
