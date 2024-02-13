<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

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

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $nomAr = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $prenomAr = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $dateNaissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $liauNaissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $etablissement = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $specialite = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $pstChu = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $dateSoutenance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numDoc = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $dateInscription = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $valide = null;

    #[ORM\ManyToOne(inversedBy: 'candidates')]
    private ?Session $Session = null;

    #[ORM\Column(nullable: true)]
    private ?int $Rang = null;

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

    public function getNomAr(): ?string
    {
        return $this->nomAr;
    }

    public function setNomAr(?string $nomAr): static
    {
        $this->nomAr = $nomAr;

        return $this;
    }

    public function getPrenomAr(): ?string
    {
        return $this->prenomAr;
    }

    public function setPrenomAr(?string $prenomAr): static
    {
        $this->prenomAr = $prenomAr;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLiauNaissance(): ?string
    {
        return $this->liauNaissance;
    }

    public function setLiauNaissance(?string $liauNaissance): static
    {
        $this->liauNaissance = $liauNaissance;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getEtablissement(): ?string
    {
        return $this->etablissement;
    }

    public function setEtablissement(?string $etablissement): static
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPstChu(): ?string
    {
        return $this->pstChu;
    }

    public function setPstChu(?string $pstChu): static
    {
        $this->pstChu = $pstChu;

        return $this;
    }

    public function getDateSoutenance(): ?string
    {
        return $this->dateSoutenance;
    }

    public function setDateSoutenance(?string $dateSoutenance): static
    {
        $this->dateSoutenance = $dateSoutenance;

        return $this;
    }

    public function getNumDoc(): ?string
    {
        return $this->numDoc;
    }

    public function setNumDoc(?string $numDoc): static
    {
        $this->numDoc = $numDoc;

        return $this;
    }

    public function getDateInscription(): ?string
    {
        return $this->dateInscription;
    }

    public function setDateInscription(?string $dateInscription): static
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getValide(): ?string
    {
        return $this->valide;
    }

    public function setValide(?string $valide): static
    {
        $this->valide = $valide;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->Session;
    }

    public function setSession(?Session $Session): static
    {
        $this->Session = $Session;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->Rang;
    }

    public function setRang(?int $Rang): static
    {
        $this->Rang = $Rang;

        return $this;
    }
}
