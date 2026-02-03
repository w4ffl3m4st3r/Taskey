<?php

use Framework\Kernel;
use Framework\Request;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!is_string($path)) {
    $path = '/';
}

$request = new Request($_SERVER['REQUEST_METHOD'], $path, $_GET, $_POST);

$response = $kernel->handle($request);

$response->echo();
