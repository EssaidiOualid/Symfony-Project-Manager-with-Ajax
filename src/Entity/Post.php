<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?Specialite $Specialite = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?Categorie $Categorie = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?Session $Session = null;

    #[ORM\Column]
    private ?int $nbrPost = null;

    #[ORM\Column]
    private ?int $nbrReste = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSession(): ?Session
    {
        return $this->Session;
    }

    public function setSession(?Session $Session): static
    {
        $this->Session = $Session;

        return $this;
    }

    public function getNbrPost(): ?int
    {
        return $this->nbrPost;
    }

    public function setNbrPost(int $nbrPost): static
    {
        $this->nbrPost = $nbrPost;

        return $this;
    }

    public function getNbrReste(): ?int
    {
        return $this->nbrReste;
    }

    public function setNbrReste(int $nbrReste): static
    {
        $this->nbrReste = $nbrReste;

        return $this;
    }
}
