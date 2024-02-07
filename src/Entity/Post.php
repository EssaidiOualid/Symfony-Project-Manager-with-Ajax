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

    #[ORM\OneToMany(mappedBy: 'Post', targetEntity: Candidat::class, orphanRemoval: true, cascade:["persist","remove"])]
    private Collection $candidats;

    public function __construct()
    {
        $this->candidats = new ArrayCollection();
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

    /**
     * @return Collection<int, Candidat>
     */
    public function getCandidats(): Collection
    {
        return $this->candidats;
    }

    public function addCandidat(Candidat $candidat): static
    {
        if (!$this->candidats->contains($candidat)) {
            $this->candidats->add($candidat);
            $candidat->setPost($this);
        }

        return $this;
    }

    public function removeCandidat(Candidat $candidat): static
    {
        if ($this->candidats->removeElement($candidat)) {
            // set the owning side to null (unless already changed)
            if ($candidat->getPost() === $this) {
                $candidat->setPost(null);
            }
        }

        return $this;
    }
}
