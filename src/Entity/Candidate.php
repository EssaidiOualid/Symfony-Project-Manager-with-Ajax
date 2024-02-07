<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CIN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CNE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nationnalite = null;

    #[ORM\ManyToOne(inversedBy: 'candidates')]
    private ?Type $Type = null;

    #[ORM\Column]
    private ?bool $Fonctionnaire = null;

    #[ORM\ManyToOne(inversedBy: 'candidates')]
    private ?Specialite $Specialite = null;

    #[ORM\ManyToOne(inversedBy: 'candidates')]
    private ?Categorie $Categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(string $CIN): static
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getCNE(): ?string
    {
        return $this->CNE;
    }

    public function setCNE(?string $CNE): static
    {
        $this->CNE = $CNE;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNationnalite(): ?string
    {
        return $this->Nationnalite;
    }

    public function setNationnalite(?string $Nationnalite): static
    {
        $this->Nationnalite = $Nationnalite;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->Type;
    }

    public function setType(?Type $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function isFonctionnaire(): ?bool
    {
        return $this->Fonctionnaire;
    }

    public function setFonctionnaire(bool $Fonctionnaire): static
    {
        $this->Fonctionnaire = $Fonctionnaire;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->Specialite;
    }

    public function setSpecialite(?Specialite $Specialite): static
    {
        $this->Specialite = $Specialite;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
    }
}
