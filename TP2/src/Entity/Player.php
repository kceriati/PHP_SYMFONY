<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="player")
 */

class Player
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
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $email;
    
    /**
     * @ORM\ManyToMany(targetEntity="Game", mappedBy="playerGame")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="Score",mappedBy="player")
     */
    private $scoreGame;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->username;
    }

    public function setUserName(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getScoreGame()
    {
        return $this->scoreGame;
    }

    public function setScoreGame($scoreGame): void
    {
        $this->scoreGame = $scoreGame;
    }

}
