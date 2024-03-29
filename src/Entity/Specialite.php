<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
class Specialite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\Column]
    private ?int $dureeFormation = null;

    #[ORM\ManyToOne(inversedBy: 'specialites')]
    private ?Type $Type = null;

    #[ORM\OneToMany(mappedBy: 'Specialite', targetEntity: Post::class, orphanRemoval: true, cascade: ["persist", "remove"])]
    private Collection $posts;

    #[ORM\OneToMany(mappedBy: 'Specialite', targetEntity: Candidate::class)]
    private Collection $candidates;

    #[ORM\Column(
        length: 255,
        nullable: true
    )]
    private ?string $intituleHtml = null;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->candidates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDureeFormation(): ?int
    {
        return $this->dureeFormation;
    }

    public function setDureeFormation(int $dureeFormation): static
    {
        $this->dureeFormation = $dureeFormation;

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

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setSpecialite($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getSpecialite() === $this) {
                $post->setSpecialite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidate>
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): static
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates->add($candidate);
            $candidate->setSpecialite($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): static
    {
        if ($this->candidates->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getSpecialite() === $this) {
                $candidate->setSpecialite(null);
            }
        }

        return $this;
    }

    public function getIntituleHtml(): ?string
    {
        return $this->intituleHtml;
    }

    public function setIntituleHtml(?string $intituleHtml): static
    {
        $this->intituleHtml = $intituleHtml;

        return $this;
    }
}
