<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reponses')]
    private ?historique $historiqueid = null;

    #[ORM\ManyToOne(inversedBy: 'reponses')]
    private ?questions $questionid = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponseutilisateur = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoriqueid(): ?historique
    {
        return $this->historiqueid;
    }

    public function setHistoriqueid(?historique $historiqueid): static
    {
        $this->historiqueid = $historiqueid;

        return $this;
    }

    public function getQuestionid(): ?questions
    {
        return $this->questionid;
    }

    public function setQuestionid(?questions $questionid): static
    {
        $this->questionid = $questionid;

        return $this;
    }

    public function getReponseutilisateur(): ?string
    {
        return $this->reponseutilisateur;
    }

    public function setReponseutilisateur(?string $reponseutilisateur): static
    {
        $this->reponseutilisateur = $reponseutilisateur;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
