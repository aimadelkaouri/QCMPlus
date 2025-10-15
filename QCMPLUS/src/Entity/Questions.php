<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    private ?questionnaire $questionnaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse4 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse5 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $bonnereponse = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(targetEntity: Reponse::class, mappedBy: 'questionid')]
    private Collection $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionnaire(): ?questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?questionnaire $questionnaire): static
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReponse1(): ?string
    {
        return $this->reponse1;
    }

    public function setReponse1(?string $reponse1): static
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    public function getReponse2(): ?string
    {
        return $this->reponse2;
    }

    public function setReponse2(?string $reponse2): static
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    public function getReponse3(): ?string
    {
        return $this->reponse3;
    }

    public function setReponse3(?string $reponse3): static
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->reponse4;
    }

    public function setReponse4(?string $reponse4): static
    {
        $this->reponse4 = $reponse4;

        return $this;
    }

    public function getReponse5(): ?string
    {
        return $this->reponse5;
    }

    public function setReponse5(?string $reponse5): static
    {
        $this->reponse5 = $reponse5;

        return $this;
    }

    public function getBonnereponse(): ?string
    {
        return $this->bonnereponse;
    }

    public function setBonnereponse(string $bonnereponse): static
    {
        $this->bonnereponse = $bonnereponse;

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

    /**
     * @return Collection<int, Reponse>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): static
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setQuestionid($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): static
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestionid() === $this) {
                $reponse->setQuestionid(null);
            }
        }

        return $this;
    }
}
