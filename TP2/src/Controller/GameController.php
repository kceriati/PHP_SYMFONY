<?php

namespace App\Controller;


use App\FakeData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo lister les jeux de la base
         */
        $games = FakeData::games(15);
        return $this->render("game/index.html.twig", ["games" => $games]);

    }

    public function add(Request $request): Response
    {
        $game = FakeData::games(1)[0];

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/game");
        }
        return $this->render("game/form.html.twig", ["game" => $game]);
    }


    public function show($id): Response
    {
        $game = FakeData::games(1)[0];
        return $this->render("game/show.html.twig", ["game" => $game]);
    }


    public function edit($id, Request $request): Response
    {
        $game = FakeData::games(1)[0];

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/game");
        }
        return $this->render("game/form.html.twig", ["game" => $game]);


    }

    public function delete($id): Response
    {
        /**
         * @todo supprimer l'objet
         */
        return $this->redirectTo("/game.html.twig");

    }

}