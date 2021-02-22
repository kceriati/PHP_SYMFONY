<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity()
 * @ORM\Table(name="score")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="datetime")
     * @var string A "Y-m-d H:i:s" formatted value
     */
    private DateTime  $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="scores")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="scores")
     */
    private $game;


    public function getPlayer()
    {
        return $this->player;
    }
    public function setPlayer($player): void
    {
        $this->player = $player;
    }

    public function getGame()
    {
        return $this->game;
    }

    public function setGame($game): void
    {
        $this->game = $game;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score): void
    {
        $this->score = $score;
    }

    public function getDate(): DateTime
    {
        return $this->created_at;
    }

    public function setDate(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
}