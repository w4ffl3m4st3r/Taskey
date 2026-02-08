<?php

namespace App\Controllers;

use Framework\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response("Welcome to Home", 200);
    }
    public function about(): Response
    {
        return new Response("Welcome to About", 200);
    }
}