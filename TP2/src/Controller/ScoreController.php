<?php

namespace App\Controller;


use App\FakeData;
use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Score;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ScoreController extends AbstractController
{


    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scores = FakeData::scores();

        $games = FakeData::games();
        $players = FakeData::players();

        return $this->render("score/index.html.twig", [
            "scores" => $scores,
            "games" => $games,
            "players" => $players
        ]);
    }

    public function add(Request $request): Response
    {
        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/score");
        }
    }

}