<?php

namespace App\Controller;


use App\FakeData;
use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $games = $entityManager
            ->getRepository(Game::class)
            ->findAll();

        return $this->render("game/index.html.twig", ["games" => $games]);
    }

    public function add(Request $request, EntityManagerInterface $entityManager, $id): Response
    {
        $game = new Game();

        if ($request->getMethod() == Request::METHOD_POST) {
            $game->setName($request->get('name'));
            $game->setImage($request->get('image'));
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectTo("/game");
        }

        return $this->render("game/form.html.twig", ["game" => $game]);
    }


    public function show($id, EntityManagerInterface $entityManager): Response
    {
        $game = $entityManager
            ->getRepository(Game::class)
            ->find($id);
            
        return $this->render("game/show.html.twig", ["game" => $game]);
    }


    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = $entityManager->getRepository(Game::class)->find($id);

        if ($request->getMethod() == Request::METHOD_POST) {
            $game->setName($request->request->get('name'));
            $game->setImage($request->request->get('image'));
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectTo("/game");
        }

        return $this->render("game/form.html.twig", ["game" => $game]);
    }

    public function delete($id, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Game::class);
        $game = $repository->find($id);
        $entityManager->remove($game);
        $entityManager->flush();

        return $this->redirectTo("/game.html.twig");

    }
}