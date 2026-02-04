<?php

use Framework\Kernel;
use Framework\Request;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();

$router = $kernel->getRouter();

$router->addRoute('GET', '/', "Welcome to Taskey");
$router->addRoute('GET', '/about', "About Taskey");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!is_string($path)) {
    $path = '/';
}

$request = new Request($_SERVER['REQUEST_METHOD'], $path, $_GET, $_POST);

$response = $kernel->handle($request);

$response->echo();
