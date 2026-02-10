<?php

namespace App;

use App\Controllers\HomeController;
use Exception;
use Framework\ServiceContainer;
use Framework\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @throws Exception
     */
    public function register(ServiceContainer $serviceContainer): void
    {
        $homeController = new HomeController();

        try {
            $serviceContainer->set(HomeController::class, $homeController);
        } catch (Exception $exception) {
            echo $exception;
        }
    }
}