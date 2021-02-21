<?php

namespace App\Entity;

use App\Repository\Score\Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScoreRepository::class)
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
     * @ORM\Column(type="date", nullable=false)
     */
    private $created_at;

    /**
     * // Nous faisons une relation Many(Player) To One(Score)
     * @var Player
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="Score")
     */
    private $registrar;
    public function getRegistrar(): Player
    {
        return $this->registrar;
    }
    public function setRegistrar(Game $registrar): void
    {
        $this->registrar = $registrar;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getDate(): mixed
    {
        return $this->created_at;
    }

    public function setDate(mixed $created_at): mixed
    {
        $this->email = $created_at;

        return $this;
    }
}