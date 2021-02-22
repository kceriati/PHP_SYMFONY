<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

abstract class AbstractController
{
    public function render($templateName, $data = []):Response
    {
        $loader = new FilesystemLoader(__DIR__ . "/../../templates");

        $twig = new Environment($loader, [
            'cache' => __DIR__ . "/../../var/cache/",
            'debug' => true,
        ]);
        
        return new Response($twig->render($templateName, $data));
    }
    public function redirectTo($path):Response{
        return new RedirectResponse($path);
    }
}