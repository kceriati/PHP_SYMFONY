<?php


namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render("home/index.html.twig", ["name" => $request->query->get('name')]);
        
    }
}