<?php

namespace App\Controller;

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
        $scores = $entityManager->getRepository(Score::class)->findAll();
        $games = $entityManager->getRepository(Game::class)->findAll();
        $players = $entityManager->getRepository(Player::class)->findAll();

        return $this->render("score/index.html.twig", [
            "scores" => $scores,
            "games" => $games,
            "players" => $players
        ]);
    }

    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $score = new Score();

        if ($request->getMethod() == Request::METHOD_GET) {
            $player = $entityManager
                        ->getRepository(Player::class)
                        ->find($request->get('player'));


            $game = $entityManager
                        ->getRepository(Game::class)
                        ->find($request->get('game'));

            $score->setPlayer($player);
            $score->setGame($game);

            $score->setScore($request->get('score'));
            $score->setDate(new \DateTime());
            $entityManager->persist($score);
            $entityManager->flush();
            return $this->redirectTo("/score");
        }
    }

    public function delete(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Score::class);
        $score = $repository->find($request->get('id'));
        $entityManager->remove($score);
        $entityManager->flush();
        return $this->redirectTo("/score");
    }

}