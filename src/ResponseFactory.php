<?php

namespace Framework;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ResponseFactory
{
    private Environment $twig;

    public function __construct(bool $debug, string $path)
    {
        $loader = new FilesystemLoader($path);
        $this->twig = new Environment($loader, [
            'debug' => $debug,
        ]);
    }

    /**
     * @param string $template
     * @param array<string, mixed> $parameters
     * @return Response
     * @throws Exception
     */
    public function view(string $template, array $parameters = []): Response
    {
        $default = [
            'navigation' => [
                array('caption' => 'Home', 'href' => '/'),
                array('caption' => 'About', 'href' => 'about'),
                array('caption' => 'Tasks', 'href' => 'tasks'),
            ]
        ];

        try {
            return new Response(200, $this->twig->render($template, array_merge($default, $parameters)));
        } catch (Exception $e) {
            throw new Exception('Failed to render page ' . $e);
        }
    }

    public function body(string $txt): Response
    {
        return new Response($txt, 200);
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function notFound(): Response
    {
        try {
            return new Response(404, $this->twig->render('404.html.twig', [
                'navigation' => [
                    array('caption' => 'Home', 'href' => '/'),
                    array('caption' => 'About', 'href' => 'about'),
                    array('caption' => 'Tasks', 'href' => 'tasks'),
                ]
            ]), null);
        } catch (Exception $e) {
            throw new Exception('Failed to render page ' . $e);
        }
    }
}