<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 50)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $ageMini = null;

    #[ORM\Column]
    private ?int $ageMaxi = null;



    #[ORM\ManyToOne]
    private ?Pole $pole = null;

    #[ORM\ManyToMany(targetEntity: Adherent::class, inversedBy: 'categories')]
    private Collection $adherent;

    public function __construct()
    {
        $this->adherent = new ArrayCollection();
        $this->pole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAgeMini(): ?int
    {
        return $this->ageMini;
    }

    public function setAgeMini(int $ageMini): self
    {
        $this->ageMini = $ageMini;

        return $this;
    }

    public function getAgeMaxi(): ?int
    {
        return $this->ageMaxi;
    }

    public function setAgeMaxi(int $ageMaxi): self
    {
        $this->ageMaxi = $ageMaxi;

        return $this;
    }

    /**
     * @return Collection<int, Adherent>
     */
    public function getAdherent(): Collection
    {
        return $this->adherent;
    }

    public function addAdherent(Adherent $adherent): self
    {
        if (!$this->adherent->contains($adherent)) {
            $this->adherent->add($adherent);
        }

        return $this;
    }

    public function removeAdherent(Adherent $adherent): self
    {
        $this->adherent->removeElement($adherent);

        return $this;
    }

    /**
     * @return Collection<int, Pole>
     */
    public function getPole(): Collection
    {
        return $this->pole;
    }

    public function addPole(Pole $pole): self
    {
        if (!$this->pole->contains($pole)) {
            $this->pole->add($pole);
        }

        return $this;
    }

    public function removePole(Pole $pole): self
    {
        $this->pole->removeElement($pole);

        return $this;
    }

    public function setPole(?Pole $pole): self
    {
        $this->pole = $pole;

        return $this;
    }
}
