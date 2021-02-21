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

    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $score = new Score();

        if ($request->getMethod() == Request::METHOD_POST) {
            $player = $entityManager
                        ->getRepository(Player::class)
                        ->find($request->get('player'));


            $game = $entityManager
                        ->getRepository(Game::class)
                        ->find($request->get('game'));

            $score->setRegistrar($player);
            $score->setGame($game);

            $score->setScore($request->get('score'));
            $score->setDate(new \DateTime());
            $entityManager->persist($score);
            $entityManager->flush();
            return $this->redirectTo("/score");
        }
    }

}