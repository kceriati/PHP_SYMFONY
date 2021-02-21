<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Game
 * @ORM\Entity()
 * @ORM\Table(name="game")
 */
class Game
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Player", inversedBy="owner")
     */
     private $playerGame;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="game")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

  
    public function getPlayerGame()
    {
        return $this->playerGame;
    }

    public function setPlayerGame($playerGame): void
    {
        $this->playerGame = $playerGame;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score): void
    {
        $this->score = $score;
    }

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Player", mappedBy="registrar")
     */
    private $registrations;
    public function __construct()
    {
        $this->registrations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function register(Player $player)
    {
        $this->registrations[] = $player;
    }
    public function getRegistrations()
    {
        return $this->registrations;
    }
}
