<?php


namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/",name="homepage")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render("home/index.html.twig", ["name" => $request->query->get('name')]);
    }
}
