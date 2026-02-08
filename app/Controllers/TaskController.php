<?php

namespace App\Controllers;

use Framework\Response;

class TaskController
{
    public function index(): Response
    {
        return new Response("Welcome to Tasks", 200);
    }
    public function create(): Response
    {
        return new Response("Create tasks", 200);
    }
}
